
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

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <title>Course Enrollment Charts</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!--icons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
 
  </style>
</head>

<body>

<?php
global $CFG, $COURSE, $DB, $USER, $ROLE;
 $con =mysqli_connect("localhost","root","","deliadata");

$query = "SELECT *
FROM mdl_user INNER JOIN mdl_user_info_data ON mdl_user.id = mdl_user_info_data.userid";
$result = mysqli_query($con,$query);


?>
<?php
// Database connection using Moodle's $DB object
global $DB, $USER;

// Teacher's username from the session
$teacherUsername = $USER->username;

// Fetch the courses taught by the specified teacher grouped by category
$sql_courses = "SELECT c.id AS course_id, c.fullname AS course_name, c.category AS category_id, cc.name AS category_name
FROM mdl_course c
JOIN mdl_context ctx ON c.id = ctx.instanceid
JOIN mdl_role_assignments ra ON ctx.id = ra.contextid
JOIN mdl_user u ON ra.userid = u.id
JOIN mdl_course_categories cc ON c.category = cc.id
WHERE u.username = :username AND c.category != 0
AND ctx.contextlevel = 50
AND ra.roleid = 3"; // Assuming 3 is the role ID for teachers

$params = ['username' => $teacherUsername];
$courses = $DB->get_records_sql($sql_courses, $params);

// Fetch courses into an array grouped by category
$courses_by_category = [];
foreach ($courses as $course) {
    $category_id = $course->category_id;
    if (!isset($courses_by_category[$category_id])) {
        $courses_by_category[$category_id] = [
            'category_name' => $course->category_name,
            'courses' => [],
        ];
    }
    $courses_by_category[$category_id]['courses'][] = $course;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <!-- Include jQuery and DataTables CSS/JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
<?php foreach ($categories as $category) : ?>
    <h2><?php echo htmlspecialchars($category->name); ?></h2>
    <form method="post" id="courseForm-<?php echo $category->id; ?>">
        <select name="course_id" id="course-<?php echo $category->id; ?>" class="form-control course-select" data-category-id="<?php echo $category->id; ?>">
            <option value="">All Courses</option>
            <?php foreach ($courses_by_category[$category->id]['courses'] as $course) : ?>
                <option value="<?php echo $course->course_id; ?>"><?php echo htmlspecialchars($course->course_name); ?></option>
            <?php endforeach; ?>
        </select>
    </form>
    <br>

    <table id="example_<?php echo $category->id; ?>" class="table table-hover" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th Hidden>Student ID</th>
                <th>Student Name</th>
                <th>Course Name</th>
                <th>Status</th>
                <th class="action-column hidden">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($courses_by_category[$category->id]['courses'] as $course) :
                // Fetch students enrolled in each course
                $sql_students = "SELECT u.id AS id, u.firstname, u.lastname, c.fullname AS course_name,
                rc.status AS reportcard_status
                FROM mdl_user u
                JOIN mdl_role_assignments ra ON u.id = ra.userid
                JOIN mdl_context ctx ON ra.contextid = ctx.id
                JOIN mdl_course c ON ctx.instanceid = c.id
                LEFT JOIN mdl_local_reportcards rc ON u.id = rc.userid AND c.id = rc.courseid
                WHERE ctx.instanceid = :courseid
                AND ctx.contextlevel = 50
                AND ra.roleid = 5
                ORDER BY u.lastname, u.firstname, c.fullname";

                $students = $DB->get_records_sql($sql_students, ['courseid' => $course->course_id]);

                foreach ($students as $student) :
                    $no++;
                    $record = $DB->get_record('local_reportcards', ['userid' => $student->id, 'courseid' => $course->course_id]);
                  
                      
                      if ($record && $record->status === 'uploaded') {
                          $status_class = 'btn-success';
                          $status_text = 'Uploaded';
                          $view_link = "upload/view.php?action=view&id={$student->id}&course_id={$course->course_id}";
                          $delete_link = "upload/view.php?action=delete&id={$student->id}&course_id={$course->course_id}";
                          $actions = "
                              <a class='dropdown-item' href='{$view_link}'>View</a>
                              <div class='dropdown-divider'></div>
                              <a class='dropdown-item text-danger' href='{$delete_link}'>Delete</a>
                          ";
                      } else {
                          $status_class = 'btn-danger';
                          $status_text = 'Not Uploaded';
                          $upload_link = "upload/index.php?id={$student->id}&course_id={$course->course_id}";
                          $actions = "<a class='dropdown-item' href='{$upload_link}'>Upload</a>";
                      }
                  ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                          <td hidden><?php echo htmlspecialchars($student->id); ?></td>
                          <td><?php echo htmlspecialchars($student->firstname . ' ' . $student->lastname); ?></td>
                          <td><?php echo htmlspecialchars($student->course_name); ?></td>
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
                  <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endforeach; ?>

<script>
    $(document).ready(function() {

        // Initialize DataTables for each table
        <?php foreach ($categories as $category) : ?>
        $('#example_<?php echo $category->id; ?>').DataTable();
        <?php endforeach; ?>
    });
</script>

</body>
</html>
