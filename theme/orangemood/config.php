<?php

$THEME->name = 'orangemood';

////////////////////////////////////////////////////
// Name of the theme. Most likely the name of
// the directory in which this file resides. 
////////////////////////////////////////////////////


$THEME->parents = array('base');

/////////////////////////////////////////////////////
// Which existing theme(s) in the /theme/ directory
// do you want this theme to extend. A theme can 
// extend any number of themes. Rather than 
// creating an entirely new theme and copying all 
// of the CSS, you can simply create a new theme, 
// extend the theme you like and just add the 
// changes you want to your theme.
////////////////////////////////////////////////////


$THEME->sheets = array('screen');

////////////////////////////////////////////////////
// Name of the stylesheet(s) you've including in 
// this theme's /styles/ directory.
////////////////////////////////////////////////////


$THEME->enable_dock = false;

////////////////////////////////////////////////////
// Do you want to use the new navigation dock?
////////////////////////////////////////////////////


$THEME->layouts = array(
    'base' => array(
        'theme' => 'orangemood',
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-post',
    ),
    'general' => array(
        'theme' => 'orangemood',
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-post',
    ),
    'course' => array(
        'theme' => 'orangemood',
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-post'
    ),
    'coursecategory' => array(
        'theme' => 'orangemood',
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-post',
    ),
    'incourse' => array(
        'theme' => 'orangemood',
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-post',
    ),
    'frontpage' => array(
        'theme' => 'orangemood',
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-post',
    ),
    'admin' => array(
        'theme' => 'orangemood',
        'file' => 'general.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'mydashboard' => array(
        'theme' => 'orangemood',
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-post',
        'options' => array('langmenu'=>true),
    ),
    'mypublic' => array(
        'theme' => 'orangemood',
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-post',
    ),
    'login' => array(
        'theme' => 'orangemood',
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('langmenu'=>true),
    ),
    'popup' => array(
        'theme' => 'orangemood',
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('nofooter' =>false),
    ),
    'frametop' => array(
        'theme' => 'orangemood',
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('nofooter' =>false),
    ),
    'maintenance' => array(
        'theme' => 'orangemood',
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('nofooter' =>false, 'nonavbar'=>true),
    ),
);

///////////////////////////////////////////////////////////////
// These are all of the possible layouts in Moodle. The
// simplest way to do this is to keep the theme and file
// variables the same for every layout. Including them
// all in this way allows some flexibility down the road
// if you want to add a different layout template to a
// specific page.
///////////////////////////////////////////////////////////////
