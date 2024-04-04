<?php

require_once("../config.php");
global $CFG, $DB, $USER;
require_once($CFG->dirroot.'/test/form.php');

// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();
$mform = new simplehtml_form();

// Form processing and displaying is done here.
if ($mform->is_cancelled()) {
    echo "You has clicked cancel button";
    
} else if ($fromform = $mform->get_data()) {
   
    print_r($fromform);

} else {
   
    $mform->set_data($toform);

    // Display the form.
    $mform->display();
}


