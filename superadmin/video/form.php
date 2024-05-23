<?php

require_once("$CFG->libdir/formslib.php");

class simplehtml_form extends moodleform {

    function definition() {
        global $CFG;
       
        $mform = $this->_form; // Don't forget the underscore! 

        
        $mform->addElement('text', 'title', 'Title');

        $mform->addElement(
            'filepicker',
            'userfile',
            'Video',
            null,
            [
                'maxbytes' => 1111111111,
                'accepted_types' => '*',
            ]
        );

        $mform->addElement('textarea', 'description', 'Description', 'wrap="virtual" rows="5" cols="5"');

        $attributes = 'test';
        $options = array(
            'VOD' => 'VOD',
            'Podcast' => 'Podcast',
        );
        $select = $mform->addElement('select', 'category', 'Category', $options);
        // This will select the colour blue.
        $select->setSelected('VOD');
       
        $this->add_action_buttons();


    }                           // Close the function

}       
