<?php
// This file is part of Moodle - http://moodle.org/
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
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

$q = optional_param('q', '', PARAM_RAW);
$search = optional_param('search', '', PARAM_RAW);
$page = optional_param('page', 0, PARAM_INT);
$perpage = optional_param('perpage', '', PARAM_RAW);
$blocklist = optional_param('blocklist', 0, PARAM_INT);
$modulelist = optional_param('modulelist', '', PARAM_PLUGIN);
$tagid = optional_param('tagid', '', PARAM_INT);

if ($q) {
    $search = $q;
}

$capabilities = array('moodle/course:create', 'moodle/category:manage');
$usercatlist = core_course_category::make_categories_list($capabilities);

$search = trim(strip_tags($search));

$site = get_site();
$searchcriteria = array();
foreach (array('search', 'blocklist', 'modulelist', 'tagid') as $param) {
    if (!empty($$param)) {
        $searchcriteria[$param] = $$param;
    }
}

$urlparams = array();
if ($perpage !== 'all' && !($perpage = (int) $perpage)) {
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
    $PAGE->set_title($strsearch);
} else {
    $PAGE->set_title($strsearchresults);
    if ((can_edit_in_category() || !empty($usercatlist))) {
        $aurl = new moodle_url('/course/management.php', $searchcriteria);
        $searchform = $OUTPUT->single_button($aurl, get_string('managecourses'), 'get');
    } else {
        $searchform = $courserenderer->course_search_form($search);
    }
    $PAGE->set_button($searchform);

    $eventparams = array('context' => $PAGE->context, 'other' => array('query' => $search));
    $event = \core\event\courses_searched::create($eventparams);
    $event->trigger();
}

$PAGE->set_heading('Student Grade Report');

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
<title>Student Grade Report Test</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
<style>
    .details-control {
        cursor: pointer;
    }
    .child-row {
        display: none;
    }
</style>
</head>
<body>

<?php
$conn = new mysqli("localhost", "root", "", "deliadata");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT 
        u.id AS student_id,
        CONCAT(u.firstname, ' ', u.lastname) AS student_name,
        c.id AS course_id,
        c.fullname AS course_name,
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
        mdl_course c ON c.id IN (
            SELECT 
                DISTINCT courseid 
            FROM 
                mdl_grade_items
)
        LEFT JOIN (SELECT gg.userid, gi.courseid,
        SUM(gg.finalgrade)/2 AS total_grade FROM mdl_grade_grades gg JOIN mdl_grade_items gi ON gg.itemid = gi.id
        GROUP BY gg.userid, gi.courseid
        ) gg ON u.id = gg.userid AND c.id = gg.courseid
        LEFT JOIN
        mdl_user_info_data nadi ON u.id = nadi.userid AND nadi.fieldid = 14
        LEFT JOIN
        mdl_user_info_data state ON u.id = state.userid AND state.fieldid = 1
        WHERE
        r.shortname = 'student'
        ORDER BY
        student_name, course_name";

        $result = $conn->query($query);

        $students = [];
        while ($row = $result->fetch_assoc()) {
        $student_id = $row['student_id'];
        if (!isset($students[$student_id])) {
        $students[$student_id] = [
        'student_name' => $row['student_name'],
        'nadi_name' => $row['nadi_name'],
        'state_name' => $row['state_name'],
        'courses' => []
        ];
        }
        $students[$student_id]['courses'][] = [
        'course_name' => $row['course_name'],
        'total_grade' => round($row['total_grade'], 1)
        ];
        }

        $conn->close();
        ?>

<div class="table-container">
    <table id="studentTable" class="display">
        <thead>
            <tr>
                <th></th>
                <th>STUDENT NAME</th>
                <th>STATE</th>
                <th>NADI NAME</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student_id => $student_data): ?>
            <tr data-student-id="<?php echo $student_id; ?>">
                <td class="details-control">+</td>
                <td><?php echo htmlspecialchars($student_data['student_name']); ?></td>
                <td><?php echo htmlspecialchars($student_data['state_name']); ?></td>
                <td><?php echo htmlspecialchars($student_data['nadi_name']); ?></td>
            </tr>
            <tr class="child-row" data-student-id="<?php echo $student_id; ?>" style="display: none;">
                <td colspan="4">
                    <table class="child-table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>COURSE NAME</th>
                                <th>GRADE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($student_data['courses'] as $course): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($course['course_name']); ?></td>
                                <td><?php echo htmlspecialchars($course['total_grade']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('#studentTable').DataTable({
        "paging": false,
        "searching": false,
        "info": false
    });

    // Toggle child rows on click
    $('#studentTable tbody').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var childRow = tr.next('tr.child-row');

        if (childRow.is(':visible')) {
            // This row is already open - close it
            childRow.hide();
            $(this).text('+');
        } else {
            // Open this row
            childRow.show();
            $(this).text('-');
        }
    });
});

</script>
<?php echo $OUTPUT->footer(); ?>
