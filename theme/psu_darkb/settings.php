<?php

 
defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

// Logo file setting
$name = 'theme_psu_darkb/logo';
$title = get_string('logo','theme_psu_darkb');
$description = get_string('logodesc', 'theme_psu_darkb');
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$settings->add($setting);

// link color setting
	$name = 'theme_psu_darkb/linkcolor';
	$title = get_string('linkcolor','theme_psu_darkb');
	$description = get_string('linkcolordesc', 'theme_psu_darkb');
	$default = '#113759';
	$previewconfig = NULL;
	$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
	$settings->add($setting);

// main color setting
	$name = 'theme_psu_darkb/maincolor';
	$title = get_string('maincolor','theme_psu_darkb');
	$description = get_string('maincolordesc', 'theme_psu_darkb');
	$default = '#00573D';
	$previewconfig = NULL;
	$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
	$settings->add($setting);


}