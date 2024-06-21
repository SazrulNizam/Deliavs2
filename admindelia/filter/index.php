
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

require_once("../../config.php");
require_once($CFG->dirroot.'/course/lib.php');



// List of minimum capabilities which user need to have for editing/moving course


$courseurl = core_course_category::user_top() ? new moodle_url('/index.php') : null;
$PAGE->navbar->add("Home", $courseurl);
$PAGE->navbar->add("Manage Teacher", new moodle_url('../library.php'));


$PAGE->set_heading('Add User Filter');


echo $OUTPUT->header();
global $CFG, $COURSE, $DB, $USER, $ROLE;
 $con =mysqli_connect("localhost","root","","deliadata");




$query = "SELECT *
FROM mdl_local_teachers ";
$result = mysqli_query($con,$query);


?>


<!DOCTYPE html>
<html>
   <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Bootstrap CSS -->
<style>

</style>
 
</head> 
<body>
    
<form>
<div class="accordion" id="accordionExample">
  <div class="">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne,#icon1,#icon2" aria-expanded="true" aria-controls="collapseOne icon1 icon2">
Personal Information  
<i id="icon1" class="float-right collapse show " data-feather="arrow-down" width="20" height="20" stroke-width="1"></i>
<i id="icon2" class="float-right collapse " data-feather="arrow-right" width="20" height="20" stroke-width="1"></i>
</button>
      </h2>

    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" >
      <div class="card-body">
  <div class="form-group">
  <?php include "personalinformation.php" ?>

      </div>
    </div>
  </div>
  <div class="">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo,#icon3,#icon4" aria-expanded="false" aria-controls="collapseTwo">
Guardian Information 
<i id="icon3" class="float-right collapse " data-feather="arrow-down" width="20" height="20" stroke-width="1"></i>
<i id="icon4" class="float-right collapse show" data-feather="arrow-right" width="20" height="20" stroke-width="1"></i>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" >
      <div class="card-body">
  <div class="form-group">
            <?php include "guardianinformation.php" ?>
       
      </div>
    </div>
  </div>
  <div class="">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree,#icon5,#icon6" aria-expanded="false" aria-controls="collapseThree">
Academic/Non Academic  
<i id="icon5" class="float-right collapse " data-feather="arrow-down" width="20" height="20" stroke-width="1"></i>
<i id="icon6" class="float-right collapse show" data-feather="arrow-right" width="20" height="20" stroke-width="1"></i>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" >
      <div class="card-body">
      <div class="form-group">
  <?php include "academic.php" ?>

  <!-- UPSR -->
  <div class="content-header">
          <h5 class="mb-0">UPSR</h5>
          
        </div>
        <br>
  <div id="upsr"></div>
       </div>
          </div>
          
          <div class="form-row">
          <div class="form-group col-md-4">
          &nbsp;&nbsp;&nbsp;
          <button id="btnupsr" class="btn btn-primary" type="button">
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add Input</span>
                </button>             
              </div>
        </div>
        <br>
<!-- Form 3 UASA -->
<div class="card-body">
<div class="form-group">
<div class="content-header">
          <h5 class="mb-0">FORM 3 UASA</h5>
          
        </div>
        <br>
  <div id="form3"></div>
       </div>
          </div>
          
          <div class="form-row">
          <div class="form-group col-md-4">
          &nbsp;&nbsp;&nbsp;
          <button id="btnform3" class="btn btn-primary" type="button">
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add Input</span>
                </button>             
              </div>
        </div>
  <!-- End here -->
<br>
  <!-- Form 4  -->
<div class="card-body">
<div class="form-group">
<div class="content-header">
          <h5 class="mb-0">FORM 4 END OF YEAR EXAM</h5>
          
        </div>
        <br>
  <div id="form4"></div>
       </div>
          </div>
          
          <div class="form-row">
          <div class="form-group col-md-4">
          &nbsp;&nbsp;&nbsp;
          <button id="btnform4" class="btn btn-primary" type="button">
                  <i data-feather="plus" class="me-25"></i>
                  <span>Add Input</span>
                </button>             
</div>
</div>
  <!-- End here -->
   <br>

      <!-- PSYCHOMETRIC ASSESSMENT  -->
      <div class="form-row">
<div class="card-body">
<div class="form-group">
<div class="content-header">
          <h5 class="mb-0">PENTAKSIRAN AKTIVITI JASMANI SUKAN DAN KOKURIKULUM (PAJSK)</h5>
          
        </div>
        </div>
        <div class="form-group col-md-4">       
<label for="grade">Grade</label>
      <select class="form-control" id="grade">
      <option selected disabled>Please Choose</option>
      <option value="A">A</option> 
      <option value="B">B</option>
      <option value="C">C</option>
      <option value="D">D</option>
      <option value="E">E</option>
    </select>
</div>
</div>
</div>   
       
  <!-- End here -->

      <!-- PSYCHOMETRIC ASSESSMENT  -->
      <div class="form-row">
<div class="card-body">
<div class="form-group">
<div class="content-header">
          <h5 class="mb-0">PSYCHOMETRIC ASSESSMENT</h5>
          
        </div>
        </div>
        <div class="form-group col-md-4">       
<label for="grade">Grade</label>
      <select class="form-control" id="grade">
      <option selected disabled>Please Choose</option>
      <option value="A">A</option> 
      <option value="B">B</option>
      <option value="C">C</option>
      <option value="D">D</option>
      <option value="E">E</option>
    </select>
</div>
</div>
</div>   
       
  <!-- End here -->

      </div>      
    </div>
    </div>
  </div>

    <!-- School Attandace -->

<div class="">
    <div class="card-header" id="headingFour">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour,#icon7,#icon8" aria-expanded="false" aria-controls="collapseFour">
          School Attendance 
          <i id="icon7" class="float-right collapse " data-feather="arrow-down" width="20" height="20" stroke-width="1"></i>
          <i id="icon8" class="float-right collapse show" data-feather="arrow-right" width="20" height="20" stroke-width="1"></i>
        </button>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour">
      <div class="card-body">
      <?php include "school.php" ?>
      </div>
    </div>
  </div>
  
</div>


  
<br>
<div class="d-flex flex-row-reverse">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
  feather.replace()

  

});

</script>

<script>
$(document).ready(function() {
  

  $("#btnupsr").click(function(){
    $("#upsr").append('<div id="upsr1" class="form-row"><div class="form-group col-md-3"><label for="grade">Subject</label><select class="form-control" id="grade"><option selected disabled>Please Choose</option><option value="Malay Language Comprenhension">Malay Language Comprehension</option><option value="Malay Language Writing">Malay Language Writing</option><option value="English Language Comprenhension">English Language Comprenhension</option><option value="English Language Writing">English Language Writing</option><option value="Mathematics">Mathematics</option><option value="Science">Science</option></select></div><div class="form-group col-md-2"><label for="grade">Grade</label><select class="form-control" id="grade"><option selected disabled>Please Choose</option><option value="10">A+</option><option value="9">A</option><option value="8">A-</option><option value="7">B+</option><option value="6">B</option><option value="5">C+</option><option value="4">C</option><option value="3">D</option><option value="2">E</option><option value="1">G</option></select></div><div class="form-group col-md-2"><label for="formGroupExampleInput">Marks</label><input type="number" class="form-control" id="formGroupExampleInput" ></div><div class="form-group col-md-2 pt-5"><button onclick="myFunction()" class="btn btn-outline-danger text-nowrap" type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div>').fadeIn();;
    feather.replace()

  });

  $("#btnform3").click(function(){
    $("#form3").append('<div id="form3del" class="form-row"><div class="form-group col-md-3"><label for="grade">Subject</label><select class="form-control" id="grade"><option selected disabled>Please Choose</option><option value="Malay Language Comprenhension">Malay Language Comprehension</option><option value="Malay Language Writing">Malay Language Writing</option><option value="English Language Comprenhension">English Language Comprenhension</option><option value="English Language Writing">English Language Writing</option><option value="Mathematics">Mathematics</option><option value="Science">Science</option></select></div><div class="form-group col-md-2"><label for="grade">Grade</label><select class="form-control" id="grade"><option selected disabled>Please Choose</option><option value="10">A+</option><option value="9">A</option><option value="8">A-</option><option value="7">B+</option><option value="6">B</option><option value="5">C+</option><option value="4">C</option><option value="3">D</option><option value="2">E</option><option value="1">G</option></select></div><div class="form-group col-md-2"><label for="formGroupExampleInput">Marks</label><input type="number" class="form-control" id="formGroupExampleInput" ></div><div class="form-group col-md-2 pt-5"><button onclick="form3function()" class="btn btn-outline-danger text-nowrap" type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div>').fadeIn();;
    feather.replace()

  });

  $("#btnform4").click(function(){
    $("#form4").append('<div id="form4del" class="form-row"><div class="form-group col-md-3"><label for="grade">Subject</label><select class="form-control" id="grade"><option selected disabled>Please Choose</option><option value="Malay Language Comprenhension">Malay Language Comprehension</option><option value="Malay Language Writing">Malay Language Writing</option><option value="English Language Comprenhension">English Language Comprenhension</option><option value="English Language Writing">English Language Writing</option><option value="Mathematics">Mathematics</option><option value="Science">Science</option></select></div><div class="form-group col-md-2"><label for="grade">Grade</label><select class="form-control" id="grade"><option selected disabled>Please Choose</option><option value="10">A+</option><option value="9">A</option><option value="8">A-</option><option value="7">B+</option><option value="6">B</option><option value="5">C+</option><option value="4">C</option><option value="3">D</option><option value="2">E</option><option value="1">G</option></select></div><div class="form-group col-md-2"><label for="formGroupExampleInput">Marks</label><input type="number" class="form-control" id="formGroupExampleInput" ></div><div class="form-group col-md-2 pt-5"><button onclick="form4function()" class="btn btn-outline-danger text-nowrap" type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div>').fadeIn();;
    feather.replace()

  });
  

});

function myFunction() {
  const element = document.getElementById("upsr1");
  element.remove();
  confirm("Are you sure want to delete this input?");
}

function form3function() {
  const element = document.getElementById("form3del");
  element.remove();
  confirm("Are you sure want to delete this input?");
}

function form4function() {
  const element = document.getElementById("form4del");
  element.remove();
  confirm("Are you sure want to delete this input?");
}



</script>


<script>

$('.repeater-default').repeater({
  show: function () {
    $(this).slideDown();
  },
  hide: function (deleteElement) {
    if (confirm('Are you sure you want to delete this element?')) {
      $(this).slideUp(deleteElement);
    }
  }
});

</script>

    
    <script type="text/javascript">     
function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ( (charCode > 31 && charCode < 48) || charCode > 57) {
            return false;
        }
        return true;
    }
</script>

  
  <?php
  
  echo $OUTPUT->footer();

  ?>


</html>
