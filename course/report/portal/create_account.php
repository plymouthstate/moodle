<?php
require_once 'autoload.php';

//include the Moodle config file for access to $CFG and moodle libs
include_once('../../../config.php');
include_once('../../../auth/cas/auth.php');

if(!isset($_GET['username']) || !isset($_GET['pidm'])){
	exit('You must provide a username and pidm. Probably loaded this directly. Naughty, naughty.');
}

$username = $_GET['username'];
$pidm = $_GET['pidm'];

$now = mktime();

//check that the redirect happened in the last 30 seconds and exit if it didnt
if(($now + 30) < $_GET['time'] || ($now - 30) > $_GET['time']){
	exit( 'Expired hash...<br />' . $now . '<br />' . $_GET['time']);
}	

//check that the hash is correct
if(md5($username . $_GET['time'] . 'monkeyballz') != $_GET['hash']){
	exit( 'Bad hash' );
}

//load the CAS plugin moodle style
$authcas = get_auth_plugin('cas');

//check to make sure we have a valid Banner (myPlymouth) user
if(!IDMObject::getIdentifier($username, 'login_name', 'pidm')){
	exit('Sorry, ' . $username . ' does not appear to be a valid Banner user');
}//end valid user check

//$user = $authcas->get_userinfo_asobj(addslashes($username));
$user = new StdClass;
$identifiers = IDMObject::getIdentifier($username, 'login_name', '*');
unset( $identifiers['ssn'] );
$user->username = $username;
$user->idnumber = $identifiers['psu_id'];
$user->firstname = $identifiers['first_name'];
$user->lastname = $identifiers['last_name'];
$user->email = $username . '@plymouth.edu';
$user->icq = '';
$user->phone1 = '';
$user->phone2 = '';
$user->institution = '';
$user->department = '';
$user->timemodified   = time();
$user->confirmed  = 1;
$user->auth       = 'cas';
$user->mnethostid = $CFG->mnet_localhost_id;
$user->address = '';
$user->city = 'Plymouth';
$user->country = 'US';
$user->url = '';
if (empty($user->lang)) {
	$user->lang = $CFG->lang;
}

global $DB;
if ($id = $DB->insert_record('user',$user)) {
	echo "\t"; print_string('auth_dbinsertuser', 'auth', array(stripslashes($user->username), $id)); echo "\n";
	if (!empty($authcas->config->forcechangepassword)) {
		set_user_preference('auth_forcepasswordchange', 1, $userobj->id);
	}
} else {
	echo "\t"; print_string('auth_dbinsertusererror', 'auth', $user->username); echo "\n";
}
