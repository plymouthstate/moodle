<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once(dirname(__FILE__) . '/locallib.php');

global $CFG, $USER, $PAGE;

require_login();

$context = get_context_instance(CONTEXT_SYSTEM);

$url = new moodle_url('/local/psu/test.php');

$PAGE->set_url($url);
$PAGE->set_context($context);

echo $OUTPUT->header();

require_capability('moodle/site:config', $context);
