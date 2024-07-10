
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

$courseurl = core_course_category::user_top() ? new moodle_url('/index.php') : null;
$PAGE->navbar->add("Home", $courseurl);
$PAGE->navbar->add("Student Report", new moodle_url('/course/newpage.php'));
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

$PAGE->set_heading('Student Report Card');
$PAGE->set_title('Student Report Card');

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
<?php

// Database connection
$conn = mysqli_connect("localhost", "root", "", "deliadata");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch categories
$sql_categories = "SELECT id, name FROM mdl_course_categories WHERE id != 0";
$result_categories = mysqli_query($conn, $sql_categories);

if (!$result_categories) {
    die("Query failed: " . mysqli_error($conn));
}

// Categories into an array
$categories = [];
while ($category = mysqli_fetch_assoc($result_categories)) {
    $categories[] = $category;
}

if (empty($categories)) {
    die("No categories found.");
}

// Fetch all courses
$courses = [];
$sql_courses = "SELECT id, fullname, category FROM mdl_course WHERE category != 0";
$result_courses = mysqli_query($conn, $sql_courses);

if (!$result_courses) {
    die("Query failed: " . mysqli_error($conn));
}

while ($course = mysqli_fetch_assoc($result_courses)) {
    $courses[] = $course;
}

// Fetch all students
$students = [];
$sql_students = "SELECT ka.id, ka.firstname, ka.lastname, c.id AS course_id, c.fullname AS course_name, nadi.data AS nadi_name, c.category AS category_id
FROM mdl_user ka
JOIN mdl_user_enrolments ra ON ka.id = ra.userid
JOIN mdl_enrol en ON ra.enrolid = en.id
JOIN mdl_course c ON en.courseid = c.id
JOIN mdl_user_info_data role ON ka.id = role.userid AND role.fieldid = 6 AND role.data = 'Student'
LEFT JOIN mdl_user_info_data nadi ON ka.id = nadi.userid AND nadi.fieldid = 14
GROUP BY ka.id, ka.firstname, ka.lastname, c.id, c.fullname, nadi.data, c.category";

$result_students = mysqli_query($conn, $sql_students);
if ($result_students === false) {
    die("Query failed: " . mysqli_error($conn));
}

while ($student = mysqli_fetch_assoc($result_students)) {
    $students[] = $student;
}

// Check if a course is selected and filter students
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['course_id'])) {
    $courseId = $_POST['course_id'];

    if (!empty($courseId)) {
        $students = array_filter($students, function ($student) use ($courseId) {
            return $student['course_id'] == $courseId;
        });
    }
}

// Close the database connection
mysqli_close($conn);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <style>
 
    .table-container {
            margin-bottom: 20px;
        }
  
    </style>
</head>
<body>

<h2 id="courseHeading"></h2>

<?php foreach ($categories as $category) : ?>
    <h3><?php echo htmlspecialchars($category['name']); ?></h3>
    <form method="post" id="courseForm-<?php echo $category['id']; ?>">
    <div class="form-row">
    <div class="form-group col-md-2 ">
        <select name="course_id" id="course-<?php echo $category['id']; ?>" class="form-control course-select" data-category-id="<?php echo $category['id']; ?>">
            <option value="">All Courses</option>
            <?php foreach ($courses as $course) :
                if ($course['category'] == $category['id']) : ?>
                    <option value="<?php echo $course['id']; ?>" <?php echo (isset($_POST['course_id']) && $_POST['course_id'] == $course['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($course['fullname']); ?>
                    </option>
                <?php endif;
            endforeach; ?>
        </select>
        </div>
        </div>
    </form>
    <br>
    <div class="table-container">
        <table id="example-<?php echo $category['id']; ?>" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <td>No</td>
                    <td hidden>Student ID</td>
                    <td>Student Name</td>
                    <td>Course</td>
                    <td>Nadi Name</td>
                    <td hidden>Course ID</td>
                    <td>Status</td>
                    <td class="action-column">Action</td>
                </tr>
            </thead>
            <tbody>
            <tbody>
    <?php
    $no = 0;
    foreach ($students as $student) :
        if ($student['category_id'] == $category['id']) :
            $no++;
            // Fetch the status for each student
            $record = $DB->get_record('local_reportcards', array('userid' => $student['id'], 'courseid' => $student['course_id']));
            

            if ($record && $record->status === 'uploaded') {
                $status_class = 'btn-success';
                $status_text = 'Uploaded';
                $filename = $record->path;     

                $actions = "
                    <a class='dropdown-item' href='upload/download.php?id=$record->file'>View</a>
                    <div class='dropdown-divider'></div>
                    <a class='dropdown-item text-danger' href='upload/view.php?action=delete&id={$student['id']}&course_id={$student['course_id']}'>Delete</a>
                ";
            } else {
                $status_class = 'btn-danger';
                $status_text = 'Not Uploaded';
                $actions = "
                    <a class='dropdown-item' href='upload/index.php?id={$student['id']}&course_id={$student['course_id']}'>Upload</a>
                ";
            }
    ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td hidden><?php echo htmlspecialchars($student['id']); ?></td>
                <td><?php echo htmlspecialchars($student['firstname'] . ' ' . $student['lastname']); ?></td>
                <td><?php echo htmlspecialchars($student['course_name']); ?></td>
                <td><?php echo htmlspecialchars($student['nadi_name']); ?></td>
                <td hidden><?php echo htmlspecialchars($student['course_id']); ?></td>
                <td><button type="button" class="btn <?php echo $status_class; ?>" disabled><?php echo $status_text; ?></button></td>
                <td class="action-column">
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu">
                            <?php echo $actions; ?>
                        </div>
                    </div>
                </td>
            </tr>
    <?php
        endif;
    endforeach;
    ?>
</tbody>

        </table>
    </div>
<?php endforeach; 


?>

<script>
$(document).ready(function() {
    var selectedCourses = {}; // Object to store selected courses for each category

    // Event listener for course selection change
    $('.course-select').change(function() {
        var categoryId = $(this).data('category-id');
        var courseId = $(this).val();
        selectedCourses[categoryId] = courseId; // Store the selected course for this category
        updateTableVisibility(categoryId, courseId); // Update the table rows visibility for the selected category
    });

    // Function to update table rows visibility based on selected course
    function updateTableVisibility(categoryId, courseId) {
        $('#example-' + categoryId + ' tbody tr').each(function() {
            var courseTd = $(this).find('td:eq(5)'); 
            if (courseTd.text() === courseId || courseId === '') {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        if (courseId !== '') {
            $('#example-' + categoryId + ' .action-column').css('display', 'table-cell');
        } else {
            $('#example-' + categoryId + ' .action-column').hide();
        }
    }

    // Initialize DataTables for each category's table
    $('.course-table').each(function() {
        var categoryId = $(this).data('category-id');
        $(this).DataTable();
    });

    // Show action columns if a specific course is already selected on page load
    $('.course-select').each(function() {
        var initialSelectedCourse = $(this).val();
        var categoryId = $(this).data('category-id');
        selectedCourses[categoryId] = initialSelectedCourse; // Store the selected course for this category
        updateTableVisibility(categoryId, initialSelectedCourse);
    });

    // Restore selected courses when page loads or is refreshed
    Object.keys(selectedCourses).forEach(function(categoryId) {
        $('#course-' + categoryId).val(selectedCourses[categoryId]);
    });
});


</script>
<?php echo $OUTPUT->footer();?>
</body>
</html>