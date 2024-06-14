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

require_once ("../config.php");
require_once ($CFG->dirroot . '/course/lib.php');

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

$PAGE->set_heading('Student Grade Report');

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
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade Report</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
    <style>
        .table-container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<?php

$conn = new mysqli("localhost", "root", "", "deliadata");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch unique states
$states = $conn->query("SELECT DISTINCT data AS state FROM mdl_user_info_data WHERE fieldid = 1");
$stateOptions = [];
while ($state = $states->fetch_assoc()) {
    $stateOptions[] = $state['state'];
}

// Fetch categories
$categories = $conn->query("SELECT id, name FROM mdl_course_categories");

while ($category = $categories->fetch_assoc()) {
    $category_id = $category['id'];
    $category_name = $category['name'];

    // Fetch the list of courses for this category
    $courses = $conn->query("SELECT id, fullname FROM mdl_course WHERE category = $category_id");
    $courseList = [];
    while ($course = $courses->fetch_assoc()) {
        $courseList[$course['id']] = $course['fullname'];
    }

    // Fetch the student grades for this category along with Nadi name and state
    $query = "SELECT 
            u.id AS student_id,
            CONCAT(u.firstname, ' ', u.lastname) AS student_name,
            c.id AS course_id,
            COALESCE(gg.total_grade, 0) AS total_grade,
            nadi.data AS nadi_name,
            state.data AS state_name
        FROM 
            mdl_user u
        JOIN 
            mdl_role_assignments ra ON u.id = ra.userid
        JOIN 
            mdl_role r ON ra.roleid = r.id
        JOIN 
            mdl_course c ON c.category = $category_id
        LEFT JOIN (
            SELECT 
                gg.userid, 
                gi.courseid, 
            SUM(gg.finalgrade)/2 AS total_grade
            FROM 
                mdl_grade_grades gg
            JOIN 
                mdl_grade_items gi ON gg.itemid = gi.id
            GROUP BY 
                gg.userid, gi.courseid
        ) gg ON u.id = gg.userid AND c.id = gg.courseid
        LEFT JOIN 
            mdl_user_info_data nadi ON u.id = nadi.userid AND nadi.fieldid = 14
        LEFT JOIN 
            mdl_user_info_data state ON u.id = state.userid AND state.fieldid = 1
        WHERE
            r.shortname = 'student'
        ORDER BY 
            student_name";

    $result = $conn->query($query);

    // Structure to hold the student data
    $students = [];
    while ($row = $result->fetch_assoc()) {
        $student_id = $row['student_id'];
        if (!isset($students[$student_id])) {
            $students[$student_id] = [
                'student_name' => $row['student_name'],
                'nadi_name' => $row['nadi_name'], // Include Nadi name
                'state_name' => $row['state_name'], // Include State name
                'grades' => array_fill_keys(array_keys($courseList), 0)
            ];
        }
        $students[$student_id]['grades'][$row['course_id']] = round($row['total_grade'], 1); // Round grade to 1 decimal point
    }

    if (count($students) > 0) {
        echo "<div class='table-container'>";
        echo "<h2>$category_name</h2>";
        echo "<table id='table_$category_id' class='display'>";
        echo "<thead><tr><th>Student Name</th><th>Student ID</th><th>Nadi Name</th><th>State</th>";
        foreach ($courseList as $courseName) {
            echo "<th>$courseName</th>";
        }
        echo "</tr></thead><tbody>";

        foreach ($students as $student_id => $student_data) {
            echo "<tr>";
            echo "<td>{$student_data['student_name']}</td>";
            echo "<td>$student_id</td>";
            echo "<td>{$student_data['nadi_name']}</td>"; // Display Nadi name
            echo "<td>{$student_data['state_name']}</td>"; // Display State name
            foreach ($student_data['grades'] as $grade) {
                echo "<td>$grade</td>";
            }
            echo "</tr>";
        }

        echo "</tbody></table>";
        echo "</div>";
    } else {
        echo "<div class='table-container'>";
        echo "<p>No data available for category: $category_name</p>";
        echo "</div>";
    }
}

$conn->close();
?>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize DataTable for each table
    $("table.display").each(function() {
        $(this).DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            columnDefs: [
                { targets: [1], visible: false } // Hide the second column (index 1)
    ]});
    });

    // Filter table based on selected state
    $('#state_filter').on('change', function() {
        var selectedState = $(this).val().toLowerCase();
        console.log('Selected State:', selectedState); 
        $("table.display").each(function() {
            var table = $(this).DataTable();
            table.column(3).search(selectedState).draw(); 
            console.log('Table filtered'); 
        });
    });
});
</script>
<?php echo $OUTPUT->footer();?>
</body>
</html>