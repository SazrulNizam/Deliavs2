<?php

require_once("../../config.php");
global $CFG, $DB, $USER, $OUTPUT;

$courseurl = core_course_category::user_top() ? new moodle_url('/index.php') : null;
$PAGE->navbar->add("Home", $courseurl);
$PAGE->navbar->add('Library', new moodle_url('/course/newpage.php'));

$PAGE->set_heading('Library');

// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();

?>
<!DOCTYPE html>
<html>
<div class="list-group">
 
  <a href="#" onclick="location.href='podcast/podcast.php'" class="list-group-item list-group-item-action">Podcast</a>
  <a href="#" onclick="location.href='vod/vod.php'" class="list-group-item list-group-item-action">Video On Demand</a>
  <a href="#" onclick="location.href='recording/recording.php'" class="list-group-item list-group-item-action">Recording Class</a>
  <a href="#" onclick="location.href='notes/notes.php'" class="list-group-item list-group-item-action">All Notes</a>
</div>
</html>
<?php
echo $OUTPUT->footer();
?>
