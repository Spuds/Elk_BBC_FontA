<?php

/**
 * @package Elk FontAwesome Button
 * @author Spuds
 * @copyright (c) 2015 Spuds
 * @license Mozilla Public License version 1.1 http://www.mozilla.org/MPL/1.1/
 *
 * @version 1.0.1
 *
 */

/**
 * ibb_fa_button
 *
 * - Editor hook, integrate_bbc_buttons hook, Called from Editor.subs.php
 * - Used to add buttons to the editor menu bar
 *
 * @param mixed[] $bbc_tags
 */
function ibb_fa_button(&$bbc_tags)
{
	// This is the group we intend to modify
	$where = $bbc_tags['row1'][2];

	// And here we insert the new value after font
	$bbc_tags['row1'][2] = elk_array_insert($where, 'font', array('fontawesome'), 'after', false);

	// Add the javascript, this tells the editor what to do with the new button
	loadJavascriptFile('faButton.plugin.js', array(), 'faButton');

	// CSS specific to this button presentation in the editor toolbar
	loadCSSFile('faButton.css', array(), 'fa44');
}

/**
 * integrate_editor_plugins
 *
 * - Editor hook, integrate_editor_plugins hook, Called from Editor.subs.php
 * - Used to add plugins to the editor
 *
 * @param string $editor_id
 */
function iep_fa_button($editor_id)
{
	global $context;

	$context['controls']['richedit'][$editor_id]['plugin_addons'][] = 'fontawesome';
}

/**
 * integrate_init_theme
 *
 * Called from Load.php, used here to turn on FA support in ElkArte 1.1
 */
function iit_fa_button()
{
	global $modSettings;

	if (empty($modSettings['require_font-awesome']))
		$modSettings['require_font-awesome'] = true;
}
