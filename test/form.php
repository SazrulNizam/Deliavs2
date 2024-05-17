<?php

require_once("$CFG->libdir/formslib.php");

class simplehtml_form extends moodleform {

    function definition() {
        global $CFG;
       
        $mform = $this->_form; // Don't forget the underscore! 

        
        $mform->addElement('text', 'id', 'student id');
       

        $this->add_action_buttons();


    }                           // Close the function

}       
