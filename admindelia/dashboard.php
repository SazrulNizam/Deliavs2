
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
 
$q         = optional_param('q', '', PARAM_RAW);       // Global search words.
$search    = optional_param('search', '', PARAM_RAW);  // search words
$page      = optional_param('page', 0, PARAM_INT);     // which page to show
$perpage   = optional_param('perpage', '', PARAM_RAW); // how many per page, may be integer or 'all'
$blocklist = optional_param('blocklist', 0, PARAM_INT);
$modulelist= optional_param('modulelist', '', PARAM_PLUGIN);
$tagid     = optional_param('tagid', '', PARAM_INT);   // searches for courses tagged with this tag id

// Use global search.
if ($q) {
    $search = $q;
}

// List of minimum capabilities which user need to have for editing/moving course
$capabilities = array('moodle/course:create', 'moodle/category:manage');

// Populate usercatlist with list of category id's with course:create and category:manage capabilities.
$usercatlist = core_course_category::make_categories_list($capabilities);

$search = trim(strip_tags($search)); // trim & clean raw searched string

$site = get_site();

$searchcriteria = array();
foreach (array('search', 'blocklist', 'modulelist', 'tagid') as $param) {
    if (!empty($$param)) {
        $searchcriteria[$param] = $$param;
    }
}
$urlparams = array();
if ($perpage !== 'all' && !($perpage = (int)$perpage)) {
    // default number of courses per page
    $perpage = $CFG->coursesperpage;
} else {
    $urlparams['perpage'] = $perpage;
}
if (!empty($page)) {
    $urlparams['page'] = $page;
}
$PAGE->set_url('/course/newpage.php', $searchcriteria + $urlparams);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$courserenderer = $PAGE->get_renderer('core', 'course');

if ($CFG->forcelogin) {
    require_login();
}

$strcourses = new lang_string("courses");
$strsearch = new lang_string("search");
$strsearchresults = new lang_string("searchresults");
$strnovalidcourses = new lang_string('novalidcourses');

$courseurl = core_course_category::user_top() ? new moodle_url('/index.php') : null;
$PAGE->navbar->add("Home", $courseurl);
$PAGE->navbar->add('Dashboard', new moodle_url('/course/newpage.php'));


if (empty($searchcriteria)) {
    // no search criteria specified, print page with just search form
    $PAGE->set_title($strsearch);
} else {
    // this is search results page
    $PAGE->set_title($strsearchresults);
    // Link to manage search results should be visible if user have system or category level capability
    if ((can_edit_in_category() || !empty($usercatlist))) {
        $aurl = new moodle_url('/course/management.php', $searchcriteria);
        $searchform = $OUTPUT->single_button($aurl, get_string('managecourses'), 'get');
    } else {
        $searchform = $courserenderer->course_search_form($search);
    }
    $PAGE->set_button($searchform);

    // Trigger event, courses searched.
    $eventparams = array('context' => $PAGE->context, 'other' => array('query' => $search));
    $event = \core\event\courses_searched::create($eventparams);
    $event->trigger();
}

$PAGE->set_heading('Dashboard');

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
   <link rel="stylesheet" href="dashboard.css">
   <script src=
"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>  
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!------ Include the above in your HEAD tag ---------->
<link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<style>
      .ui-tabs-anchor {
    outline: none;
  }
    .container {
        width: 70%;
        margin: 15px auto;
    }
 
    body {
        text-align: center;
    }
 
    h2 {
        text-align: center;
        font-family: "Verdana", sans-serif;
        font-size: 30px;
    }

    #examplee th {
        text-align:center;
    }

    #examplee td {
        text-align:center;
    }
    #example th {
        text-align:center;
    }
    
</style>
</head> 
<body>
<?php



?>
<div class="pb-4 pt-3">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-users"></i>
        <span class="count-numbers"><?php echo $data['total']; ?></span>
        <span class="count-name">Total Student</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-book"></i>
        <span class="count-numbers"><?php echo $allcourse['allcourse']; ?></span>
        <span class="count-name">Total Course</span>
      </div>
    </div>


  </div>
</div>
<hr class="pb-4" style="width:100%;text-align:left;margin-left:0">

<?php include 'graphstate.php' 

?>
<div id="tabs" >
<ul>
<li ><a href="#tabs-1" style="font-size: 12px">January</a></li>
<li ><a href="#tabs-2"  style="font-size: 12px">February</a></li>
<li ><a href="#tabs-3"  style="font-size: 12px">March</a></li>
<li ><a href="#tabs-4"  style="font-size: 12px">April</a></li>
<li ><a href="#tabs-5"  style="font-size: 12px">May</a></li>
<li ><a href="#tabs-6"  style="font-size: 12px">Jun</a></li>
<li ><a href="#tabs-7"  style="font-size: 12px">July</a></li>
<li ><a href="#tabs-8"  style="font-size: 12px">August</a></li>
<li ><a href="#tabs-9"  style="font-size: 12px">September</a></li>
<li ><a href="#tabs-10"  style="font-size: 12px">October</a></li>
<li ><a href="#tabs-11"  style="font-size: 12px">November</a></li>
<li ><a href="#tabs-12"  style="font-size: 12px">December</a></li>

</ul>
<div class="container">
    
        
<?php include "chart.php"?>       
</div>
</div>

    <hr class="pb-4" style="width:100%;text-align:left;margin-left:0">
    <h2>Students By <?php echo $USER->firstname ?></h2>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th style="text-align:center;">No.</th>
            <th>First Name</th>
            <th>Email</th>
            <th>City</th>

        </tr>
    </thead>
    <tbody>
        
    
           <?php 

           $no = 0;
          while ($row = $result->fetch_assoc()) {

            if($row["data"] == 'Student'){
             
            $no++;
          echo  
          "<tr>
          <td style='text-align:center;'>" . $no . "</td>
          <td>" . $row["firstname"] . "</td>
          <td>" . $row["email"] . "</td>
          <td>" . $row["city"] . "</td>
          </tr>";
            }
           }
        
           ?>        
    </tbody>
</table>


        
    </tbody>
</table>
        
<?php $data = 1; ?>
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
<script src="https://canvasjs.com/assets/script/jquery-ui.1.11.2.min.js"></script>
<script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
<script>

$('#example').DataTable({
    layout: {
        topStart: {
            buttons: [
            {
            extend: 'csv',
            filename: 'Student data'
            },
          {
            extend: 'excel',
            filename: 'Student data'
            },
          {
            extend: 'pdf',
            filename: 'Student data'
            }
        ]
        }
    }
});

$('#examplee').DataTable({
    layout: {
        topStart: {
            buttons: [
            {
            extend: 'csv',
            filename: 'Course report'
            },
          {
            extend: 'excel',
            filename: 'Course report'
            },
          {
            extend: 'pdf',
            filename: 'Course report'
            }
        ]
        }
    }
});


</script>

  <?php
  include "graphscript.php";

  echo $OUTPUT->footer();

  ?>


</html>
