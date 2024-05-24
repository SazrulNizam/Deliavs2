
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

require_once("../../../config.php");
require_once($CFG->dirroot.'/course/lib.php');



// List of minimum capabilities which user need to have for editing/moving course


$courseurl = core_course_category::user_top() ? new moodle_url('/index.php') : null;
$PAGE->navbar->add("Home", $courseurl);
$PAGE->navbar->add("Library", new moodle_url('../library.php'));
$PAGE->navbar->add('Video On Demand', new moodle_url('vod.php'));


$PAGE->set_heading('Video On Demand');

$PAGE->requires->css(new \moodle_url('https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css'));
$PAGE->requires->css(new \moodle_url('https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap4.css'));
echo $OUTPUT->header();
global $CFG, $COURSE, $DB, $USER, $ROLE;
 $con =mysqli_connect("localhost","root","","deliadata");




$query = "SELECT *
FROM mdl_user INNER JOIN mdl_user_info_data ON mdl_user.id = mdl_user_info_data.userid";
$result = mysqli_query($con,$query);


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
    
<button type="button" class="btn btn-success float-right" onclick="location.href='index.php'" >Add Video <i class="fa-solid fa-plus"></i></button><br>
<br>

<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th style="text-align:center;">No.</th>
            <th>Email</th>
            <th>First Name</th>
           
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        
           <?php 
          
 

           while ($row = $result->fetch_assoc()) {

            if($row["data"] == 'Student'){
           
             
            $no++;
          echo  
          "<tr>
          <td>" . $no . "</td>
          <td>" . $row["email"] . "</td>
          <td>" . $row["firstname"] . "</td>

          <td> <a href='index.php?id=". $row["userid"]."'". "class='btn btn-primary'>Upload</button>
                </td></tr>";
            
           }
           }
           ?>
       
        
    </tbody>
</table>


</body>
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
<script>

$('#example').DataTable({
    layout: {
       
    }
});
</script>
  <?php
  
  echo $OUTPUT->footer();

  ?>


</html>
