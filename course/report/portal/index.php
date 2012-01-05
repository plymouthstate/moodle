<?php
include_once('PSUTools.class.php');

//include the Moodle config file for access to $CFG and moodle libs
include_once('../../../config.php');

define('EDITING_TEACHER', 3);
define('NON_EDITING_TEACHER', 4);

$username = $_GET['username'];

$now = mktime();

//check that the redirect happened in the last 30 seconds and exit if it didnt
if(($now + 30) < $_GET['time'] || ($now - 30) > $_GET['time']){
	exit( 'Expired hash...<br />' . $now . '<br />' . $_GET['time']);
}	

//check that the hash is correct
if(md5($username . $_GET['time'] . 'monkeyballz') != $_GET['hash']){
	exit( 'Bad hash' );
}

//execute a couple of Moodle functions to get course data for user
$user = get_complete_user_data('username', $username, null);

complete_user_login($user);	

//if we got the $USER object, go ahead and create JSON to return to the channel
if($USER->id != 0){
	$courses = enrol_get_users_courses($USER->id);
	foreach($courses as $course){
		$i = 0;	
		$context = get_context_instance(CONTEXT_COURSE, $course->id);
		
		//get the editing faculty roles
		$teachers = get_role_users(EDITING_TEACHER, $context);
		foreach($teachers as $teacher){
			$course->instructor[$i]['username'] = $teacher->username;
			$course->instructor[$i]['type'] = 'editing';
			$i++;
		}

		//and the non-editing faculty roles
		$halflings = get_role_users(NON_EDITING_TEACHER, $context);
		foreach($halflings as $halfling){
			$course->instructor[$i]['username'] = $halfling->username;
			$course->instructor[$i]['type'] = 'non-editing';
			$i++;
		}
	}
}
$json = json_encode($courses);
echo $json;
?>
