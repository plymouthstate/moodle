<?php

// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Kaltura video assignment grade preferences form
 *
 * @package    local
 * @subpackage kaltura
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once(dirname(__FILE__) . '/locallib.php');

global $PAGE;

$param = optional_param('section', '', PARAM_TEXT);

/**
 * $enable_api_calls is a flag to enable the settings page to make API calls to
 * Kaltura.  This is done to reduce API calls when they are not needed/used.
 *
 * The API has to be called under the following criteria:
 * - Displaying the Kaltura settings page
 * - Upgrade settings page is displayed
 * (when a new plug-in is detected and is to be installed) -
 * - A global search is performed (searching from the administration block)
 */

// Check for specific reference to display the Kaltura settings page
$settings_page = !strcmp(PSU_PLUGIN_NAME, $param);

// Check if the upgrade page is being displayed
$upgrade_page = strpos($_SERVER['REQUEST_URI'], "/admin/upgradesettings.php");

// Check if a global search was performed
$global_search_page = strpos($_SERVER['REQUEST_URI'], "/admin/search.php");

$enable_api_calls = $settings_page || $upgrade_page || $global_search_page;

if ($hassiteconfig) {

    global $SESSION;

    // Add local plug-in configuration settings link to the navigation block
    $settings = new admin_settingpage('local_psu', get_string('pluginname', 'local_psu'));
    $ADMIN->add('localplugins', $settings);

    $settings->add(new admin_setting_heading('psu_heading', get_string('heading_title', 'local_psu'),
                       get_string('heading_desc', 'local_psu')));

    $adminsetting = new admin_setting_configcheckbox('disable_destructive_restore', get_string('disable_destructive_restore', 'local_psu'),
                       get_string('disable_destructive_restore_desc', 'local_psu'), '0');
    $adminsetting->plugin = PSU_PLUGIN_NAME;
    $settings->add($adminsetting);

    $adminsetting = new admin_setting_configcheckbox('assignment_sendnotification_default', get_string('assignment_sendnotification_default', 'local_psu'),
                       get_string('assignment_sendnotification_default_desc', 'local_psu'), '0');
    $adminsetting->plugin = PSU_PLUGIN_NAME;
    $settings->add($adminsetting);

}//end if
