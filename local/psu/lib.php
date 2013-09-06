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

require_once(dirname(__FILE__) . '/locallib.php');

function local_psu_extends_navigation() {
		global $PAGE;

		$jsmodule = array(
				'name'     => 'local_psu',
				'fullpath' => '/local/psu/js/psu.js',
				'requires' => array('base', 'dom', 'node'),
				);

		$test_script = $CFG->wwwroot . '/local/psu/test.php';

		if( get_config( PSU_PLUGIN_NAME, 'disable_destructive_restore' ) ) {
			$PAGE->requires->js_init_call('M.local_psu.init', array($test_script), true, $jsmodule);
		}//end if

		if( 'Editing Assignment' == $PAGE->title && !$PAGE->cm->instance && get_config( PSU_PLUGIN_NAME, 'assignment_sendnotification_default' )) {
			$PAGE->requires->js_init_call('M.local_psu.toggle_assignment_sendnotification', array($test_script), true, $jsmodule);
		}//end if

}//end function
