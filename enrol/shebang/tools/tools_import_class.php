<?php

    defined('MOODLE_INTERNAL') || die();

    /**
     * SHEBanG enrolment plugin/module for SunGard HE Banner(r) data import
     *
     * This program is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or (at
     * your option) any later version.
     *
     * This program is distributed in the hope that it will be useful, but
     * WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
     * General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with this program. If not, see <http://www.gnu.org/licenses/>.
     *
     * @author      Fred Woolard <woolardfa@appstate.edu>
     * @copyright   (c) 2010 Appalachian State Universtiy, Boone, NC
     * @license     GNU General Public License version 3
     * @package     enrol
     * @subpackage  shebang
     */

    require_once($CFG->libdir.'/formslib.php');
    require_once($CFG->libdir.'/uploadlib.php');

    if (!defined('FORMID_FILE')) define ('FORMID_FILE', 'lmbfile');


    /**
     * Tool definition class
     *
     */
    class enrol_shebang_tools_import
    {

        /**
         * Tool name
         * @var string
         * @access public
         */
        public $name    = 'Import File';
        /**
         * Tool action
         *
         * @var string
         * @access public
         */
        public $action  = 'import';
        /**
         * Tool description
         *
         * @var string
         * @access public
         */
        public $desc    = 'Upload and import an LMB/IMS XML file into the database.';



        /**
         * Tool page request handler (GETs & POSTs)
         *
         * @access  public
         * @return  void
         * @uses    $CFG, $SITE, $OUTPUT, $PAGE
         */
        public function handle_request()
        {
            global $CFG, $SITE, $OUTPUT, $PAGE;



            $admin_url  = new moodle_url(enrol_shebang_plugin::PLUGIN_PATH . "/admin/settings.php", array('section' => 'enrolsettingsshebang'));
            $index_url  = new moodle_url(enrol_shebang_plugin::PLUGIN_PATH . '/tools.php');
            $import_url = new moodle_url(enrol_shebang_plugin::PLUGIN_PATH . '/tools.php', array('action' => 'import'));

            $PAGE->set_heading($SITE->fullname);
            $PAGE->set_title($SITE->fullname . ':' . get_string('LBL_TOOLS_IMPORT', enrol_shebang_plugin::PLUGIN_NAME));
            $PAGE->set_context(get_context_instance(CONTEXT_SYSTEM));
            $PAGE->set_url($admin_url);
            $PAGE->set_pagelayout('admin');

            $PAGE->navbar->add(get_string('LBL_TOOLS_INDEX',  enrol_shebang_plugin::PLUGIN_NAME), $index_url);
            $PAGE->navbar->add(get_string('LBL_TOOLS_IMPORT', enrol_shebang_plugin::PLUGIN_NAME), null);

            navigation_node::override_active_url($admin_url);

            echo $OUTPUT->header();

            $mform = new enrol_shebang_tools_import_form($import_url);
            if (!$mform->is_submitted()) {
                $mform->display();
            } elseif ($mform->is_cancelled()) {
                redirect($index_url);
            } else {

                // Handle the POSTed data
                if (!confirm_sesskey()) {
                    print_error('invalidsesskey', 'error');
                }

                $timestamp  = date("YmdHis");
                $inputfile  = "{$CFG->dataroot}/" . enrol_shebang_plugin::PLUGIN_NAME . enrol_shebang_plugin::PLUGIN_DATADIR_IMPORT . "/upload_{$timestamp}.xml";
                $mform->save_file(FORMID_FILE, $inputfile, true);

                echo $OUTPUT->heading(get_string('LBL_TOOLS_IMPORT', enrol_shebang_plugin::PLUGIN_NAME));
                echo $OUTPUT->box_start();
                ob_flush(); flush();

                // Do the work and emit some feedback
                $feedback = new progress_bar('shebang_pb', 500, true);
                $plugin   = new enrol_shebang_plugin();
                $plugin->import_lmb_file($inputfile, $feedback);

                echo $OUTPUT->continue_button(new moodle_url(enrol_shebang_plugin::PLUGIN_PATH . "/tools.php"));
                echo $OUTPUT->box_end();

            }

            echo $OUTPUT->footer();

        } // handle_request


    } // class



    /**
     * The tool interface -- moodleform class definition for the plugin
     */
    class enrol_shebang_tools_import_form extends moodleform
    {

        /**
         * Define the form's contents
         *
         * @access public
         * @return void
         */
        public function definition()
        {

            $this->_form->addElement('header', 'general', get_string('LBL_TOOLS_IMPORT', enrol_shebang_plugin::PLUGIN_NAME));
            $this->_form->addElement('filepicker', FORMID_FILE, get_string('LBL_TOOLS_IMPORT_FILE', enrol_shebang_plugin::PLUGIN_NAME));
            $this->add_action_buttons(true, get_string('LBL_TOOLS_IMPORT_SUBMIT', enrol_shebang_plugin::PLUGIN_NAME));

        } // definition

    } // class

