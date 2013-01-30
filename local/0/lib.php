<?php

	global $CFG, $PAGE;
	$jsmodule = array(
		'name'  =>  'local_psu_mod',
		'fullpath'  =>  '/local/0/prevent_destructive_restore.js',
		'requires'  =>  array('base', 'node', 'io', 'json'),
	);
	$PAGE->requires->js_init_call('M.local_psu_mod.init', null, true, $jsmodule);
	$jsmod_aup = array(
		'name' => 'alter_guest_policy',
		'fullpath' => '/local/0/alter_guest_policy.js',
		'requires'  =>  array('base', 'node', 'io', 'json'),
	);
	$PAGE->requires->js_init_call('M.alter_guest_policy.init', null, true, $jsmod_aup);
	$jsmod_lo = array(
		'name' => 'logo_override',
		'fullpath' => '/local/0/logo_override.js',
		'requires'  =>  array('base', 'node', 'io', 'json'),
	);
	$PAGE->requires->js_init_call('M.logo_override.init', null, true, $jsmod_lo);
