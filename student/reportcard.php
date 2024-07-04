
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

$PAGE->set_heading('Report Card');

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
echo $OUTPUT->header();?>
<?php

// Ensure that Moodle global $USER is loaded
require_once('../config.php');

// Check if user is logged in
if (!$USER->id) {
    // User is not logged in, handle accordingly (e.g., redirect to login page)
    redirect(new moodle_url('/login/index.php'));
}

// Fetch courses where the teacher is enrolled as a teacher
$courses = enrol_get_all_users_courses($USER->id, true);

if (empty($courses)) {
    print_error('nocourses', 'error');
}

// Fetch categories for the fetched courses
$category_ids = array_unique(array_column($courses, 'category'));
$sql_categories = "
    SELECT id, name
    FROM {course_categories}
    WHERE id IN (" . implode(',', $category_ids) . ")
    ORDER BY name";

$categories = $DB->get_records_sql($sql_categories);

if (empty($categories)) {
    print_error('nocategories', 'error');
}

// Fetch students enrolled in the courses where the teacher is a teacher
$students = [];
foreach ($courses as $course) {
    $sql_students = "
        SELECT u.id, u.firstname, u.lastname, c.id AS course_id, c.fullname AS course_name, nadi.data AS nadi_name, c.category AS category_id
        FROM {user} u
        JOIN {user_enrolments} ue ON u.id = ue.userid
        JOIN {enrol} e ON ue.enrolid = e.id
        JOIN {course} c ON e.courseid = c.id
        LEFT JOIN {user_info_data} nadi ON u.id = nadi.userid AND nadi.fieldid = (
            SELECT id FROM {user_info_field} WHERE shortname = 'nadi_name'
        )
        WHERE c.id = :courseid AND e.status = 0 -- Filter for active enrollments
        ORDER BY u.lastname, u.firstname";

    $students[$course->id] = $DB->get_records_sql($sql_students, ['courseid' => $course->id]);

    if (empty($students[$course->id])) {
        print_error('nostudents', 'error');
    }
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <!-- Include DataTables CSS/JS -->
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
    </style>
</head>
<body>

<h2 id="courseHeading">Student List TEst</h2>

<?php foreach ($categories as $category) : ?>
    <h3><?php echo htmlspecialchars($category->name); ?></h3>
    <?php foreach ($courses as $course) : ?>
        <?php if ($course->category == $category->id) : ?>
            <h4><?php echo htmlspecialchars($course->fullname); ?></h4>
            <div class="table-container">
                <table id="example-<?php echo $course->id; ?>" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th hidden>Student ID</th>
                            <th>Student Name</th>
                            <th>Nadi Name</th>
                            <th hidden>Course ID</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0;
                    foreach ($students[$course->id] as $student) :
                        $no++;
                        // Fetch the status for each student
                        $record = $DB->get_record('local_reportcards', array('userid' => $student->id, 'courseid' => $student->course_id));

                        if ($record && $record->status === 'uploaded') {
                            $status_class = 'btn-success';
                            $status_text = 'View';
                            $filename = $record->path;
                            $actions = "class='dropdown-item' href='upload/download.php?id=$record->file'";
                        } else {
                            $status_class = 'btn-danger';
                            $status_text = 'Not Uploaded';
                        }
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td hidden><?php echo htmlspecialchars($student->id); ?></td>
                            <td><?php echo htmlspecialchars($student->firstname . ' ' . $student->lastname); ?></td>
                            <td><?php echo htmlspecialchars($student->nadi_name); ?></td>
                            <td hidden><?php echo htmlspecialchars($student->course_id); ?></td>
                            <td><a type="button" class="btn <?php echo $status_class; ?>" <?php echo $actions; ?>><?php echo $status_text; ?></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>

</body>
</html>

<?php
echo $OUTPUT->footer();
?>