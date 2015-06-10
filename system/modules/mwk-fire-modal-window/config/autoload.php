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
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'medienworx',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'medienworx\ModuleMwkFireModalWindow'           => 'system/modules/mwk-fire-modal-window/src/medienworx/modules/ModuleMwkFireModalWindow.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_mwk_fire_modal_window'      		     => 'system/modules/mwk-fire-modal-window/templates',
));