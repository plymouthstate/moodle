<?php

	global $CFG, $PAGE;
	$jsmodule = array(
		'name'  =>  'local_psu_mod',
		'fullpath'  =>  '/local/0/prevent_destructive_restore.js',
		'requires'  =>  array('base', 'node', 'io', 'json')
	);
	$PAGE->requires->js_init_call('M.local_psu_mod.init', null, true, $jsmodule);
