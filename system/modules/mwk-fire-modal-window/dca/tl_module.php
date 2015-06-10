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

$GLOBALS['TL_DCA']['tl_module']['palettes']['mwk_fire_modal_window'] = '
	{title_legend},
        name,
        type;

	{button_configuration},
        fire_modal_window_button_label,
        fire_modal_window_button_class;

	{content_configuration},
		fire_modal_window_headline,
		fire_modal_window_headline_class,
		fire_modal_window_content;

	{section_configuration},
		fire_modal_window_section_color;

	{protected_legend:hide},
        protected;

    {expert_legend:hide},
        guests,
        cssID,
        space
';

$GLOBALS['TL_DCA']['tl_module']['fields']['fire_modal_window_button_label'] =
	array
	(
		'label'                 => &$GLOBALS['TL_LANG']['tl_module']['fire_modal_window_button_label'],
		'inputType'             => 'text',
		'eval'                  => array('tl_class'=>'w50'),
		'sql'                   => "varchar(255) NOT NULL default ''"
	);

$GLOBALS['TL_DCA']['tl_module']['fields']['fire_modal_window_button_class'] =
	array
	(
		'label'                 => &$GLOBALS['TL_LANG']['tl_module']['fire_modal_window_button_class'],
		'inputType'             => 'text',
		'eval'                  => array('tl_class'=>'w50'),
		'sql'                   => "varchar(255) NOT NULL default ''"
	);

$GLOBALS['TL_DCA']['tl_module']['fields']['fire_modal_window_button_option'] =
	array
	(
		'label'     			=> &$GLOBALS['TL_LANG']['tl_module']['fire_modal_window_button_option'],
		'exclude'   			=> true,
		'inputType' 			=> 'select',
		'options'   			=> array
		(
			'btn-default',
			'btn-primary',
			'btn-success',
			'btn-info',
			'btn-warning',
			'btn-danger',
			'btn-link',
			'btn-custom'
		),
		'eval'      => array
		(
			'maxlength'=>200,
			'includeBlankOption'=>true,
			'tl_class'=>'w50'
		),
		'sql'       => "varchar(255) NOT NULL default ''"
	);

$GLOBALS['TL_DCA']['tl_module']['fields']['fire_modal_window_button_size'] =
	array
	(
		'label'     				=> &$GLOBALS['TL_LANG']['tl_module']['fire_modal_window_button_size'],
		'exclude'   				=> true,
		'inputType' 				=> 'select',
		'options'   				=> array
		(
			'btn-lg',
			'btn-sm',
			'btn-xs'
		),
		'eval'      => array
		(
			'maxlength'=>200,
			'includeBlankOption'=>true,
			'tl_class'=>'w50'
		),
		'sql'       => "varchar(255) NOT NULL default ''"
	);

$GLOBALS['TL_DCA']['tl_module']['fields']['fire_modal_window_headline'] =
	array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['fire_modal_window_headline'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'inputUnit',
		'options'                 => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
		'eval'                    => array('maxlength'=>200, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
	);

$GLOBALS['TL_DCA']['tl_module']['fields']['fire_modal_window_headline_class'] =
	array
	(
		'label'                 => &$GLOBALS['TL_LANG']['tl_module']['fire_modal_window_headline_class'],
		'inputType'             => 'text',
		'eval'                  => array('tl_class'=>'w50'),
		'sql'                   => "varchar(255) NOT NULL default ''"
	);

$GLOBALS['TL_DCA']['tl_module']['fields']['fire_modal_window_content'] =
	array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['fire_modal_window_content'],
		'inputType'               => 'textarea',
		'eval'                    => array
		(
			'rte'=>'tinyMCE',
			'helpwizard'=>true,
			'tl_class'=>'m12'
		),
		'sql'                     => "mediumtext NULL"
	);

$GLOBALS['TL_DCA']['tl_module']['fields']['fire_modal_window_section_color'] =
	array
	(
		'label' => &$GLOBALS['TL_LANG']['tl_module']['fire_modal_window_section_color'],
		'inputType' => 'text',
		'eval' => array
		(
			'maxlength'=>6,
			'multiple'=>true,
			'size'=>2,
			'colorpicker'=>true,
			'isHexColor'=>true,
			'decodeEntities'=>true,
			'tl_class'=>'w50 wizard'
		),
		'sql' => "varchar(64) NOT NULL default ''"
	);