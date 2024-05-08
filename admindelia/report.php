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
require_once($CFG->dirroot . '/course/lib.php');

$q = optional_param('q', '', PARAM_RAW);       // Global search words.
$search = optional_param('search', '', PARAM_RAW);  // search words
$page = optional_param('page', 0, PARAM_INT);     // which page to show
$perpage = optional_param('perpage', '', PARAM_RAW); // how many per page, may be integer or 'all'
$blocklist = optional_param('blocklist', 0, PARAM_INT);
$modulelist = optional_param('modulelist', '', PARAM_PLUGIN);
$tagid = optional_param('tagid', '', PARAM_INT);   // searches for courses tagged with this tag id

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
if ($perpage !== 'all' && !($perpage = (int) $perpage)) {
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

$courseurl = core_course_category::user_top() ? new moodle_url('/course/index.php') : null;
$PAGE->navbar->add($strcourses, $courseurl);
$PAGE->navbar->add($strsearch, new moodle_url('/course/newpage.php'));
if (!empty($search)) {
    $PAGE->navbar->add(s($search));
}

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

$PAGE->set_heading('Participant Report');

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
            text-align: center;
        }

        #example td {
            text-align: center;
        }
    </style>

</head>

<body>
    <title>Report</title>
    <h2>Students</h2>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th style="text-align:center;">State of Nadi</th>
                <th>Phase of Nadi</th>
                <th>Name of Nadi</th>
                <th>Email of Nadi</th>
                <th> Name</th>
                <th>IC number</th>
                <th>Email</th>
                <th>Age</th>
                <th>Phone Number</th>
                <th>Parents Name</th>
                <th>Email of Parents</th>
                <th>Parents P.Number</th>
                <th>Course Enroled</th>

            </tr>
        </thead>
        <tbody>

            <?php
            while ($row = $datareport->fetch_assoc()) {

                if ($row["data"] == 'Student' && $row["phone1"] == $USER->id) {

                    $datauserid = $row["userid"];
                    include 'reportconnection.php';
                    echo
                    "<tr>
          <td> " . $dstate["data"] . "</td>
          <td>" . $nphase["data"] . "</td>
          <td>" . $nnadi["data"] . "</td>
          <td>" . $nemail["data"] . "</td>
          <td>" . $uname["firstname"] . "</td>
          <td>" . $icnumber["data"] . "</td>
          <td>" . $uemail["email"] . "</td>
          <td>" . $uage["data"] . "</td>
          <td>" . $pnum["data"] . "</td>
          <td>" . $pname["data"] . "</td>
          <td>" . $pemail["data"] . "</td>
          <td>" . $ppnum["data"] . "</td>
          <td><ul>";

                    while ($rows = $enrolreport->fetch_assoc()) {

                        if ($rows["userid"] == $row["userid"]) {

                            echo "<li>" . $rows["fullname"] . "</li>";
                        }
                    }
                    echo "</ul></td></tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <hr class="pb-4" style="width:100%;text-align:left;margin-left:0">
    <h2>Courses</h2>
    <table id="examplee" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Full Name</th>
                <th>Short Name</th>
                <th>Total Students</th>



            </tr>
        </thead>
        <tbody>

            <?php
            $no = 0;
            while ($row2 = $results->fetch_assoc()) {
                $yes = 0;

                $no++;


                echo
                    "<tr>
          <td>" . $no . "</td>
          <td>" . $row2["fullname"] . "</td>
          <td>" . $row2["shortname"] . "</td>";

                $studentcourse = "SELECT *
                FROM mdl_user_enrolments INNER JOIN mdl_enrol ON mdl_user_enrolments.enrolid = mdl_enrol.id ";
                $stcourses = mysqli_query($con, $studentcourse);
                while ($row = $stcourses->fetch_assoc()) {
                    if ($row["courseid"] == $row2["id"]) {

                        $query3 = "SELECT *
                        FROM mdl_user INNER JOIN mdl_user_info_data ON mdl_user.id = mdl_user_info_data.userid WHERE data='Student'";
                        $result3 = mysqli_query($con, $query3);
                        while ($row3 = $result3->fetch_assoc()) {

                            if ($row3["userid"] == $row["userid"]) {
                                $yes++;

                            }
                        }
                    }
                }
                echo "<td>" . $yes . "</td>

          </tr>";

            }

            ?>



        </tbody>
    </table>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.bootstrap4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script>
    $('#example').DataTable({
        layout: {
            topStart: {
                buttons: [{
                        extend: 'csv',
                        filename: 'Student report'
                    },
                    {
                        extend: 'excel',
                        filename: 'Student report'
                    },
                    {
                        extend: 'pdf',
                        filename: 'Student report'
                    }
                ]
            }
        }
    });
</script>
<?php

echo $OUTPUT->footer();

?>


</html>