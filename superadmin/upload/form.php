<?php

require_once("$CFG->libdir/formslib.php");

class simplehtml_form extends moodleform {

    function definition() {
        global $CFG;
       
        $mform = $this->_form; // Don't forget the underscore! 

        
      
        $mform->addElement(
            'filepicker',
            'userfile',
            'Report Card',
            null,
            [
                'maxbytes' => 111111111,
                'accepted_types' => '*',
            ]
        );
       
        $this->add_action_buttons();


    }                           // Close the function

}       
