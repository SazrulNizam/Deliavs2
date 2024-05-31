
<?php
// This file is part of Moodle - http://moodle.org/
//
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
 * Displays external information about a course
 * @package    core_course
 * @copyright  1999 onwards Martin Dougiamas  http://dougiamas.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once("../config.php");
require_once($CFG->dirroot.'/course/lib.php');



$courseurl = core_course_category::user_top() ? new moodle_url('/index.php') : null;
$PAGE->navbar->add("Home", $courseurl);
$PAGE->navbar->add("Video", new moodle_url('video-library.php'));



$PAGE->set_heading('Video');

// $PAGE->requires->js(new \moodle_url('https://code.jquery.com/jquery-3.7.1.js'), true);
// $PAGE->requires->js(new \moodle_url('https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js'), true);
// $PAGE->requires->js(new \moodle_url('https://cdn.datatables.net/2.0.3/js/dataTables.js'), true);
// $PAGE->requires->js(new \moodle_url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'), true);
// $PAGE->requires->js(new \moodle_url('https://cdn.datatables.net/v/bs4/dt-2.0.3/b-3.0.1/b-html5-3.0.1/b-print-3.0.1/datatables.min.js'), true);
// $PAGE->requires->js(new \moodle_url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js'), true);
// $PAGE->requires->js(new \moodle_url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js'), true);
// $PAGE->requires->js(new \moodle_url('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js'), true);
// $PAGE->requires->js(new \moodle_url('https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js'), true);
// $PAGE->requires->js(new \moodle_url('https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js'), true);

// $PAGE->requires->js(new \moodle_url('script.js'));
$PAGE->requires->css(new \moodle_url('https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css'));
$PAGE->requires->css(new \moodle_url('https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap4.css'));
echo $OUTPUT->header();
global $CFG, $COURSE, $DB, $USER, $ROLE;


 include 'connection.php';


?>


<!DOCTYPE html>
<html>
   <head>
<style>



#example th {
        text-align:center;
        
    }
    #example td {
        text-align:center;
    }
    </style>
 
</head> 
<body>




<?php
while ($modalvideo = $allvideo->fetch_assoc()) {

  
  echo "
  
  <div onclick='pauseVid".$modalvideo["id"]."()' class='modal fade bd-example-modal-lg video".$modalvideo["id"]."' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-lg'>
    
    <div class='modal-content'>
    <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>Video</h4>
            </div>  
            <video width='800px' id='myVideo".$modalvideo["id"]."' src='../superadmin/video/Video/". $modalvideo["file"]. "' controls>
        </video>
    </div>
  </div>
</div>

  ";
}
?>



  



<div class="d-flex">
  <div class="mr-auto p-2"><h2>Podcast</div>
  <input type="hidden" id="count" value="<?php echo $totalpodcast['podcast']; ?>"/>

  <?php
  if ($totalpodcast['podcast'] > 4){

    echo "
    <div class='p-2'><a href ='podcast.php' class='text-primary'>View More&nbsp;<i class='fa fa-angle-right'></i></a></div>
    
    ";

  }
  ?>

</div>

<div class="card-deck">
  
<?php

$no = 0;
while ($row = $podcast->fetch_assoc()) {
$no++;
    if ($no <= 4) {

      echo "
   
  <div data-toggle='modal' data-target='.video".$row["id"]."' class='card border-dark mb-3' style='max-width: 18rem;''>
        <video src='../superadmin/video/Video/". $row["file"]. "'muted></video>
          <div class='card-body text-dark'>
            <h5 class='card-title'>". $row["title"]. "</h5>
          <p class='card-text'>". $row["description"]. "</p>
        </div>
  </div>
 
      ";

    }

  }

?>

</div>
<!-- VOD -->
<br>
<div class="d-flex">
  <div class="mr-auto p-2"><h2>Video On Demand</div>
  <?php
  if ($totalvod['vod'] > 4){

    echo "
    <div class='p-2'><a href ='vod.php' class='text-primary'>View More&nbsp;<i class='fa fa-angle-right'></i></a></div>
    
    ";

  }
  ?>
</div>

<div class="card-deck">
  
<?php

$no = 0;
while ($row2 = $vod->fetch_assoc()) {
$no++;
    if ($no <= 4) {

      echo "


      <div data-toggle='modal' data-target='.video".$row2["id"]."' class='card border-dark mb-3' style='max-width: 18rem;''>
      <video src='../superadmin/video/Video/". $row2["file"]. "'muted></video>
        <div class='card-body text-dark'>
          <h5 class='card-title'>". $row2["title"]. "</h5>
        <p class='card-text'>". $row2["description"]. "</p>
      </div>
      </div>
      ";

    }

  }

?>


</div>
<!-- Recording -->
<div class="d-flex">
  <div class="mr-auto p-2"><h2>Recording Class</div>
  <?php
  if ($totalrecording['recording'] > 4){

    echo "
    <div class='p-2'><a href ='recording.php' class='text-primary'>View More&nbsp;<i class='fa fa-angle-right'></i></a></div>
    
    ";

  }
  ?>
</div>

<div class="card-deck">
  
<?php

$no = 0;
while ($row3 = $recording->fetch_assoc()) {
$no++;
    if ($no <= 4) {

      echo "
      <div data-toggle='modal' data-target='.video".$row3["id"]."' class='card border-dark mb-3' style='max-width: 18rem;''>
      <video src='../superadmin/video/Video/". $row3["file"]. "'muted></video>
        <div class='card-body text-dark'>
          <h5 class='card-title'>". $row3["title"]. "</h5>
        <p class='card-text'>". $row3["description"]. "</p>
      </div>
      </div>
      ";

    }

  }

?>

</div>

  <!-- Notes -->
  <div class="d-flex">
    <div class="mr-auto p-2"><h2>Notes</div>
    <?php
  if ($totalnotes['notes'] > 4){

    echo "
    <div class='p-2'><a href ='notes.php' class='text-primary'>View More&nbsp;<i class='fa fa-angle-right'></i></a></div>
    
    ";

  }
  ?>
  </div>

  <div class="card-deck">
    
  <?php

  $no = 0;
  while ($row4 = $notes->fetch_assoc()) {
  $no++;
      if ($no <= 4) {

        echo "
        <div data-toggle='modal' data-target='.video".$row4["id"]."' class='card border-dark mb-3' style='max-width: 18rem;''>
        <video src='../superadmin/video/Video/".$row4["file"]. "'muted></video>
          <div class='card-body text-dark'>
            <h5 class='card-title'>". $row4["title"]. "</h5>
          <p class='card-text'>". $row4["description"]. "</p>
        </div>
        </div>
        ";

      }

    }

  ?>

  </div>

</body>

<?php
while ($script = $allvideos->fetch_assoc()) {
?>

<script>
let vid<?php echo $script['id']; ?> = document.getElementById("myVideo<?php echo $script['id']; ?>"); 

function pauseVid<?php echo $script['id']; ?>() { 
  vid<?php echo $script['id']; ?>.pause(); 

}
</script>
 

<?php
}
?>

<script src = "https://code.jquery.com/jquery-3.7.1.js"></script> 
<script src = "https://cdn.datatables.net/2.0.3/js/dataTables.js"></script> 
<script src = "https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script> 
<script src = "https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script> 
<script src = "https://cdn.datatables.net/buttons/3.0.1/js/buttons.bootstrap4.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

  <?php
  
  echo $OUTPUT->footer();

  ?>


</html>
