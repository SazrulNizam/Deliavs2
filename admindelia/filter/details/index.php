
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
$PAGE->navbar->add("Manage Filter Students", new moodle_url('../manage-filter-student.php'));
$PAGE->navbar->add('Detail Student', new moodle_url('vod.php'));

$PAGE->set_heading('Detail Student');


echo $OUTPUT->header();
global $CFG, $COURSE, $DB, $USER, $ROLE;
 $con =mysqli_connect("localhost","root","","deliadata");




 $icnumber =   $_GET["id"];

 //Personal Information
 $personal =  mysqli_query($con,"SELECT * FROM mdl_local_personal_information WHERE ic_number = $icnumber");
 $data_personal = mysqli_fetch_assoc($personal);

 //Guardian Information
 $guardian =  mysqli_query($con,"SELECT * FROM mdl_local_guardian_information WHERE userid = $icnumber");
 $data_guardian = mysqli_fetch_assoc($guardian);

 //Sibling Information
 $sibling =  mysqli_query($con,"SELECT * FROM mdl_local_sibling_information WHERE userid = $icnumber");
 
//UPSR
$upsr =  mysqli_query($con,"SELECT * FROM mdl_local_upsr WHERE userid = $icnumber");

//UASA
$uasa =  mysqli_query($con,"SELECT * FROM mdl_local_uasa WHERE userid = $icnumber");

//Form4
$form4 =  mysqli_query($con,"SELECT * FROM mdl_local_form4_exam WHERE userid = $icnumber");

 //PAJSK
 $pajsk =  mysqli_query($con,"SELECT * FROM mdl_local_non_academic WHERE userid = $icnumber AND subject='PAJSK' ");
 $data_pajsk = mysqli_fetch_assoc($pajsk);

  //PSY
  $psy =  mysqli_query($con,"SELECT * FROM mdl_local_non_academic WHERE userid = $icnumber AND subject='PSY' ");
  $data_psy = mysqli_fetch_assoc($psy);

  //Attendance
$att =  mysqli_query($con,"SELECT * FROM mdl_local_attandance WHERE userid = $icnumber");
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
  <!-- Sibling Information -->
  <div class="">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseLate,#icon31,#icon41" aria-expanded="false" aria-controls="collapseTwo">
Sibling Information 
<i id="icon31" class="float-right collapse " data-feather="arrow-down" width="20" height="20" stroke-width="1"></i>
<i id="icon41" class="float-right collapse show" data-feather="arrow-right" width="20" height="20" stroke-width="1"></i>
      </h2>
    </div>
    <!-- Collapse -->
    <div id="collapseLate" class="collapse" aria-labelledby="headingTwo" >
      <div class="card-body">
  <div class="form-group">    
  <div id="siblingdel">

  <!-- Looping Sibling -->
   <?php
   if ( mysqli_num_rows ( $sibling ) >= 1 ){

     while ($rowsibling = $sibling->fetch_assoc()) {

   ?>
       <div class="form-row">
  <div class="form-group col-md-3">
  <label for="formGroupExampleInput">Name</label>
  <input type="text" class="form-control" name="schoolname" id="formGroupExampleInput" value="<?php echo $rowsibling['sibling_name'];?>" disabled></div>
  <div class="form-group col-md-2">
    <label for="formGroupExampleInput">Education</label>
    <input type="text" name="siblingeducation[]" class="form-control" id="formGroupExampleInput" value="<?php echo $rowsibling['sibling_education'];?>" disabled ></div>
    <div class="form-group col-md-2">
        <label for="formGroupExampleInput">Age</label>
        <input type="number" name="siblingage[]" class="form-control" id="formGroupExampleInput" value="<?php echo $rowsibling['sibling_age'];?>" disabled ></div>
     </div>
<?php
     }}else{
      echo  "<p class='lead'>Not Available</p>";
     }
?>

</div>
  </div>   
      </div>
    </div>
  </div>

    <!-- ENDHERE -->
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
  <div id="upsr">
    <!-- Loop here UPSR -->
    <?php
   if ( mysqli_num_rows ( $upsr ) >= 1 ){

     while ($rowupsr = $upsr->fetch_assoc()) {

   ?>
    <div class="form-row">
<div class="form-group col-md-3 ">
    <label for="formGroupExampleInput">Subject</label>
    <input type="text" class="form-control" name="pnumber" id="formGroupExampleInput" value="<?php echo $rowupsr['subjectupsr'];?>" disabled >
  </div>
  <div class="form-group col-md-2 ">
    <label for="formGroupExampleInput">Grade</label>
    <input type="text" class="form-control" name="schoolname" id="formGroupExampleInput" value="<?php echo $rowupsr['markupsr'];?>" disabled>
  </div>
  <div class="form-group col-md-2 ">
    <label for="formGroupExampleInput">Marks</label>
    <input type="text" class="form-control" name="schoolname" id="formGroupExampleInput" value="<?php echo $rowupsr['gradeupsr'];?>" disabled >
  </div>
</div>
<?php
     }}else{
      echo  "<p class='lead'>Not Available</p>";
     }
?>
<!-- end here -->
  </div>
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
  <div id="form3">
        <!-- Loop here UASA -->
        <?php
   if ( mysqli_num_rows ( $uasa ) >= 1 ){

     while ($rowuasa = $uasa->fetch_assoc()) {

   ?>
    <div class="form-row">
<div class="form-group col-md-3 ">
    <label for="formGroupExampleInput">Subject</label>
    <input type="text" class="form-control" name="pnumber" id="formGroupExampleInput" value="<?php echo $rowuasa['subjectuasa'];?>" disabled >
  </div>
  <div class="form-group col-md-2 ">
    <label for="formGroupExampleInput">Grade</label>
    <input type="text" class="form-control" name="schoolname" id="formGroupExampleInput" value="<?php echo $rowuasa['markuasa'];?>" disabled>
  </div>
  <div class="form-group col-md-2 ">
    <label for="formGroupExampleInput">Marks</label>
    <input type="text" class="form-control" name="schoolname" id="formGroupExampleInput" value="<?php echo $rowuasa['gradeuasa'];?>" disabled >
  </div>
</div>
<?php
     }}else{
      echo  "<p class='lead'>Not Available</p>";
     }
?>
<!-- end here -->
  </div>
       </div>
          </div>
          
        
  <!-- End here -->
<br>
  <!-- Form 4  -->
<div class="card-body">
<div class="form-group">
<div class="content-header">
          <h5 class="mb-0">FORM 4 END OF YEAR EXAM<span style="color:red;">*</span></h5>
          
        </div>
        <br>
  <div id="form4">

          <!-- Loop here Form4 -->
          <?php
   if ( mysqli_num_rows ( $form4 ) >= 1 ){

     while ($rowform4 = $form4->fetch_assoc()) {

   ?>
    <div class="form-row">
<div class="form-group col-md-3 ">
    <label for="formGroupExampleInput">Subject</label>
    <input type="text" class="form-control" name="pnumber" id="formGroupExampleInput" value="<?php echo $rowform4['subjectexam'];?>" disabled >
  </div>
  <div class="form-group col-md-2 ">
    <label for="formGroupExampleInput">Grade</label>
    <input type="text" class="form-control" name="schoolname" id="formGroupExampleInput" value="<?php echo $rowform4['markexam'];?>" disabled>
  </div>
  <div class="form-group col-md-2 ">
    <label for="formGroupExampleInput">Marks</label>
    <input type="text" class="form-control" name="schoolname" id="formGroupExampleInput" value="<?php echo $rowform4['gradeexam'];?>" disabled >
  </div>
</div>
<?php
     }}else{
      echo  "<p class='lead'>Not Available</p>";
     }
?>
<!-- end here -->
    
  </div>
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
        <input type="text" value="PAJSK" name="pajsk" hidden>
        <div class="form-group col-md-2">       
        <label for="formGroupExampleInput">Average Marks</label>
        <input type="text" name="pajskgrade" class="form-control" value="<?php echo $data_pajsk['mark'];?>" disabled >
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
        <input type="text" value="PSY" name="psy" hidden>
        </div>
        <div class="form-group col-md-2">       
 <label for="formGroupExampleInput">Average Marks</label>
 <input type="text" name="pajskgrade" class="form-control" value="<?php echo $data_psy['mark'];?>" disabled >
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
  <a href="../manage-filter-student.php"><button type="submit" name="submit" class="btn btn-outline-primary">Back</button></a>
</div>

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
    $("#upsr").append('<div id="upsr1" class="form-row"> <div class="form-group col-md-3"> <label for="grade">Subject</label> <select class="form-control" name="UPSRsubject[]" id="grade"> <option value="" selected hidden>Please Choose</option> <option value="Malay Language Comprenhension">Malay Language Comprehension</option> <option value="Malay Language Writing">Malay Language Writing</option> <option value="English Language Comprenhension">English Language Comprenhension</option> <option value="English Language Writing">English Language Writing</option> <option value="Mathematics">Mathematics</option><option value="Science">Science</option> </select></div> <div class="form-group col-md-2"> <label for="grade">Grade</label> <select name="UPSRgrade[]" class="form-control" id="grade"> <option selected hidden>Please Choose</option> <option value="A+">A+</option> <option value="A">A</option> <option value="A-">A-</option> <option value="B+">B+</option> <option value="B">B</option> <option value="C+">C+</option> <option value="C">C</option> <option value="D">D</option> <option value="E">E</option> <option value="G">G</option> <option value="TH">TH</option> </select></div><div class="form-group col-md-2"> <label for="formGroupExampleInput">Marks</label> <input type="number" name="UPSRmarks[]" class="form-control" id="formGroupExampleInput" ></div> <div class="form-group col-md-2 pt-5"> <button onclick="myFunction()" class="btn btn-outline-danger text-nowrap" type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div>').fadeIn();;

    feather.replace()

  });

  $("#btnform3").click(function(){
    $("#form3").append('<div id="form3del" class="form-row"> <div class="form-group col-md-3"> <label for="grade">Subject</label> <select class="form-control" name="UASAsubject[]" id="grade"> <option value="" selected hidden>Please Choose</option> <option value="Malay Language">Malay Language</option> <option value="Mathematics">Mathematics</option> <option value="Science">Science</option> <option value="English">English</option> <option value="History">History</option> <option value="Geography">Geography</option> <option value="Arabic Language">Arabic Language</option> <option value="Chinese Language">Chinese Language</option> <option value="Tamil Language">Tamil Language</option> <option value="Punjabi Language">Punjabi Language</option> <option value="Kadazandusun Language">Kadazandusun Language</option> <option value="Semai Language">Semai Language</option> <option value="Islamic Studies">Islamic Studies</option> <option value="Foundation of Computer Science">Foundation of Computer Science</option> <option value="Design and Technology">Design and Technology</option> <option value="Maharat Al-Quran">Maharat Al-Quran</option> <option value="Al-Syariah">Al-Syariah</option> <option value="Usul Al-Din">Usul Al-Din</option> <option value="Al-Lughah Al Arabiah Al-Mu Asirah">Al-Lughah Al Arabiah Al-Mu Asirah</option></select></div> <div class="form-group col-md-2"> <label for="grade">Grade</label> <select name="UASAgrade[]" class="form-control" id="grade"> <option value="" selected hidden>Please Choose</option> <option value="A+">A+</option> <option value="A">A</option> <option value="A-">A-</option> <option value="B+">B+</option> <option value="B">B</option> <option value="C+">C+</option> <option value="C">C</option> <option value="D">D</option> <option value="E">E</option> <option value="G">G</option> <option value="TH">TH</option> </select></div><div class="form-group col-md-2"> <label for="formGroupExampleInput">Marks</label> <input type="number" name="UASAmarks[]" class="form-control" id="formGroupExampleInput" ></div> <div class="form-group col-md-2 pt-5"> <button onclick="form3Function()" class="btn btn-outline-danger text-nowrap" type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div>').fadeIn();;
    feather.replace()

  });

  $("#btnsibling").click(function(){
    $("#sibling").append('<div id="siblingdel" class="form-row"> <div class="form-group col-md-4"> <label for="formGroupExampleInput">Name</label> <input type="text" name="siblingname[]" class="form-control" id="formGroupExampleInput" ></div> <div class="form-group col-md-3"> <label for="formGroupExampleInput">Education</label> <input type="text" name="siblingeducation[]" class="form-control" id="formGroupExampleInput" ></div> <div class="form-group col-md-1"> <label for="formGroupExampleInput">Age</label> <input type="number" name="siblingage[]" class="form-control" id="formGroupExampleInput" ></div> <div class="form-group col-md-2 pt-5"> <button onclick="siblingFunction()" class="btn btn-outline-danger text-nowrap" type="button"><i data-feather="x" class="me-25"></i><span>Delete</span></button></div></div>').fadeIn();;
    feather.replace()

  });
  

});

function myFunction() {
  const element = document.getElementById("upsr1");
  element.remove();
  confirm("Are you sure want to delete this input?");
}

function form3Function() {
  const element = document.getElementById("form3del");
  element.remove();
  confirm("Are you sure want to delete this input?");
}

function siblingFunction() {
  const element = document.getElementById("siblingdel");
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

    function enforceMinMax(el) {
  if (el.value != "") {
    if (parseInt(el.value) < parseInt(el.min)) {
      el.value = el.min;
    }
    if (parseInt(el.value) > parseInt(el.max)) {
      el.value = el.max;
    }
  }
}
</script>

  
  <?php
  
  echo $OUTPUT->footer();

  ?>


</html>
