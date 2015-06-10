<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 - 2015 Agentur medienworx
 *
 * @package     mwk-fire-modal-window
 * @author      Christian Kienzl <christian.kienzl@medienworx.eu>
 * @author      Peter Ongyert <peter.ongyert@medienworx.eu>
 * @link        http://www.medienworx.eu
 * @license     http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */

namespace medienworx;

class ModuleMwkFireModalWindow extends \Module {

	/**
	 * @var string
	 */
	protected $strTemplate = 'mod_mwk_fire_modal_window';


	protected function compile() {

		$jsSelector = 'mwk' . $this->id . '2';

		$fireModalWindowButton = '<button id="'. $jsSelector .'" type="button" class="btn ' . $this->fire_modal_window_button_option . ' ' . $this->fire_modal_window_button_size . ' ' . $this->fire_modal_window_button_class . '" data-type="modal-trigger">' . $this->fire_modal_window_button_label . '</button>';

		$this->Template->jsSelector = $jsSelector;
		$this->Template->fireModalWindowButton = $fireModalWindowButton;
		$this->Template->fireModalWindowContent = $this->fire_modal_window_content;



		// generate css for background color, margin and padding
		$style = 'style="';

		if ($this->fire_modal_window_section_color) {
			$fireModalWindowSectionColor = deserialize($this->fire_modal_window_section_color);
			$style .= 'background-color:' . $this->compileColor($fireModalWindowSectionColor).';';
		}
		$style .= '"';
		if ($style == 'style="background-color:#;"') {
			$style = '';
		}

		$this->Template->fireModalWindowSection = $style;

		// check if headline is set
		if ($this->fire_modal_window_headline != '') {
			$fireModalWindowHeadline = unserialize($this->fire_modal_window_headline);
			$fireModalWindowHeadlineClass = '';
			if ($this->fire_modal_window_headline_class != '') {
				$fireModalWindowHeadlineClass = ' '.$this->fire_modal_window_headline_class;
			}

			if ($fireModalWindowHeadline['value'] != '') {
				$this->Template->headline = '<'.$fireModalWindowHeadline['unit'].' '.'class="'.$fireModalWindowHeadlineClass.'"'.'>'.$fireModalWindowHeadline['value'].'</'.$fireModalWindowHeadline['unit'].'>';
			}
		}



		// load css and javascript
		if (TL_MODE == 'FE') {
			\MwkCoreHelper::insertScriptToGlobals('/system/modules/mwk-fire-modal-window/assets/jquery/1.11.2/jquery.min.js');
			\MwkCoreHelper::insertScriptToGlobals('/system/modules/mwk-fire-modal-window/assets/css/fire-modal-window.css');
			\MwkCoreHelper::insertScriptToGlobals('/system/modules/mwk-fire-modal-window/assets/morphing-modal-window/css/style.css');
			\MwkCoreHelper::insertScriptToGlobals('/system/modules/mwk-fire-modal-window/assets/morphing-modal-window/js/main.js');
			\MwkCoreHelper::insertScriptToGlobals('/system/modules/mwk-fire-modal-window/assets/morphing-modal-window/js/modernizr.js');
			\MwkCoreHelper::insertScriptToGlobals('/system/modules/mwk-fire-modal-window/assets/morphing-modal-window/js/velocity.min.js');
		}

	}


	/**
	 * Compile a color value and return a hex or rgba color
	 * @param mixed
	 * @param boolean
	 * @param array
	 * @return string
	 */
	protected function compileColor($color, $blnWriteToFile=false, $vars=array())
	{
		if (!is_array($color))
		{
			return '#' . $this->shortenHexColor($color);
		}
		elseif (!isset($color[1]) || empty($color[1]))
		{
			return '#' . $this->shortenHexColor($color[0]);
		}
		else
		{
			return 'rgba(' . implode(',', $this->convertHexColor($color[0], $blnWriteToFile, $vars)) . ','. ($color[1] / 100) .')';
		}
	}


	/**
	 * Try to shorten a hex color
	 * @param string
	 * @return string
	 */
	protected function shortenHexColor($color)
	{
		if ($color[0] == $color[1] && $color[2] == $color[3] && $color[4] == $color[5])
		{
			return $color[0] . $color[2] . $color[4];
		}

		return $color;
	}


	/**
	 * Convert hex colors to rgb
	 * @param string
	 * @param boolean
	 * @param array
	 * @return array
	 * @see http://de3.php.net/manual/de/function.hexdec.php#99478
	 */
	protected function convertHexColor($color, $blnWriteToFile=false, $vars=array())
	{
		// Support global variables
		if (strncmp($color, '$', 1) === 0)
		{
			if (!$blnWriteToFile)
			{
				return array($color);
			}
			else
			{
				$color = str_replace(array_keys($vars), array_values($vars), $color);
			}
		}

		$rgb = array();

		// Try to convert using bitwise operation
		if (strlen($color) == 6)
		{
			$dec = hexdec($color);
			$rgb['red'] = 0xFF & ($dec >> 0x10);
			$rgb['green'] = 0xFF & ($dec >> 0x8);
			$rgb['blue'] = 0xFF & $dec;
		}

		// Shorthand notation
		elseif (strlen($color) == 3)
		{
			$rgb['red'] = hexdec(str_repeat(substr($color, 0, 1), 2));
			$rgb['green'] = hexdec(str_repeat(substr($color, 1, 1), 2));
			$rgb['blue'] = hexdec(str_repeat(substr($color, 2, 1), 2));
		}

		return $rgb;
	}


}