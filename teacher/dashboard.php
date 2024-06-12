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

$q         = optional_param('q', '', PARAM_RAW);       // Global search words.
$search    = optional_param('search', '', PARAM_RAW);  // search words
$page      = optional_param('page', 0, PARAM_INT);     // which page to show
$perpage   = optional_param('perpage', '', PARAM_RAW); // how many per page, may be integer or 'all'
$blocklist = optional_param('blocklist', 0, PARAM_INT);
$modulelist = optional_param('modulelist', '', PARAM_PLUGIN);
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
$con = mysqli_connect("localhost", "root", "", "deliadata");

$query = "select * from mdl_user";
$result = mysqli_query($con, $query);
echo $ROLE->name;
?>
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
  <!--icons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <style>
    :root {
      --blue: #2a2185;
      --white: #fff;
      --gray: #f5f5f5;
      --black1: #222;
      --black2: #999;
    }

    body {
      min-height: 100vh;
      overflow-x: hidden;
    }

    .container {
      position: relative;
      width: 100%;
    }


    /* Card in Dashboard */
    .cardBox {
      position: relative;
      width: 100%;
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-gap: 30px;
    }

    .cardBox .card {
      position: relative;
      background: var(--white);
      padding: 30px;
      border-radius: 20px;
      display: flex;
      justify-content: space-between;
      cursor: pointer;
      box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
    }

    .cardBox .card .numbers {
      position: relative;
      font-weight: 500;
      font-size: 2.5rem;
      color: var(--blue);
    }

    .cardBox .card-calendar .event {
      position: justify;
      font-weight: 300;
      font-size: 2.0rem;
      color: var(--blue);
    }

    .cardBox .card .cardName {
      color: var(--black2);
      font-size: 1.1rem;
      margin-top: 5px;
    }

    .cardBox .card-calendar .cardName-event {
      color: var(--black2);
      font-size: 1.1rem;
      margin-top: 5px;
    }


    .cardBox .card .iconBx {
      font-size: 4rem;
      color: var(--black2);
    }

    .cardBox .card .iconBx {
      font-size: 3.5rem;
      color: var(--black2);
    }

    .cardBox .card-calendar .iconBx {
      font-size: 3.5rem;
      color: var(--black2);
    }

    .cardBox .card:hover {
      background: var(--blue);
    }

    .cardBox .card-calendar:hover .cardName-event {
      color: var(--white);
    }

    .cardBox .card-calendar:hover {
      background: var(--blue);
    }

    .cardBox .card:hover .numbers,
    .cardBox .card:hover .cardName,
    .cardBox .card:hover .iconBx {
      color: var(--white);
    }

    .cardBox .card-calendar:hover .event {
      color: var(--white);
    }

    .cardBox .card-calendar {
      grid-column: span 2;
      position: relative;
      background: var(--white);
      padding: 30px;
      border-radius: 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      cursor: pointer;
      box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
    }

    .cardBox .card-calendar .cardName-event {
      color: var(--black2);
      font-size: 1.1rem;
      margin-top: 20px;
    }

    .details {
      position: relative;
      width: 100%;
      padding: 20px;
      display: grid;
      grid-template-columns: 2fr 1fr;
      grid-gap: 30px;
      /* margin-top: 10px; */
    }

    .details .student {
      grid-column: span 2;
      position: relative;
      display: grid;
      min-height: 500px;
      background: var(--white);
      padding: 20px;
      box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
      border-radius: 20px;
    }

    .details .cardHeader {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;

    }

    .cardHeader h2 {
      font-weight: 600;
      color: var(--blue);

    }

    .cardHeader .btn {
      position: relative;
      padding: 10px 15px;
      background: var(--blue);
      text-decoration: none;
      color: var(--white);
      border-radius: 6px;
      justify-content: space-around;

    }

    .details table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      table-layout: fixed;
    }

    .details table thead td {
      font-weight: 600;
    }

    .details .student table tr {
      color: var(--black1);
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .details .student table tr:last-child {
      border-bottom: none;
    }

    .details .student table tbody tr:hover {
      background: var(--blue);
      color: var(--white);
    }

    .details .student table tr td {
      padding: 30px;
    }
    

      .h2 {
        font-size: 20px;
      }

    

    /* Responsive Design */
    @media (max-width: 991px) {

      .cardBox {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 768px) {
      .details {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 480px) {

    }
      
  </style>
</head>

<body>
<div class="container">
 

    <?php
    $con = mysqli_connect("localhost", "root", "", "deliadata");

    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }
    global $DB, $USER;
    $current_session_username = $USER->username;


   // Query to fetch enrollment data
$sql_enrollments = "SELECT c.fullname AS Course,
COUNT(student_asg.userid) AS Students
FROM mdl_user AS u
JOIN mdl_role_assignments AS ra ON u.id = ra.userid
JOIN mdl_context AS teacher_context ON ra.contextid = teacher_context.id AND teacher_context.contextlevel = 50
JOIN mdl_course AS c ON teacher_context.instanceid = c.id
JOIN mdl_role_assignments AS student_asg ON student_asg.contextid = teacher_context.id
JOIN mdl_user_enrolments AS ue ON ue.userid = student_asg.userid
JOIN mdl_enrol AS e ON e.id = ue.enrolid AND e.courseid = c.id
WHERE u.username = ? AND student_asg.roleid = 5 AND c.category != 0 AND ue.status = 0
GROUP BY c.fullname
ORDER BY Students DESC;";

    // Prepare and execute the query
    $stmt_enrollments = mysqli_prepare($con, $sql_enrollments);
    if ($stmt_enrollments === false) {
      die("SQL prepare error: " . mysqli_error($con));
    }

    mysqli_stmt_bind_param($stmt_enrollments, "s", $current_session_username);
    mysqli_stmt_execute($stmt_enrollments);
    $result_enrollments = mysqli_stmt_get_result($stmt_enrollments);

    if ($result_enrollments === false) {
      die("SQL execute error: " . mysqli_error($con));
    }

    // Initialize arrays for storing labels, data, and user IDs
    $labels = [];
    $data = [];
    $userid = [];
    $courseCount = 0;

    // Iterate over the results
    while ($record = mysqli_fetch_assoc($result_enrollments)) {
      $courseName = $record['Course'];
      $enrollmentCount = $record['Students'];
      $labels[] = $courseName;
      $data[] = $enrollmentCount;
      $courseCount++;
    }

    // Calculate the total number of students
    $totalStudents = array_sum($data);


    // Close connection
    mysqli_close($con);
    ?>
    <!-- Dashboard Card-->
    
    <h1>Welcome, <?php echo ucfirst(htmlspecialchars($USER->username)); ?></h1>
  
    <div class="cardBox">
      <div class="card">
        <div class="iconBx">
          <ion-icon name="people-outline"></ion-icon>
        </div>
        <div>
          <div class="numbers"><?php echo $totalStudents ?></div>
          <div class="cardName">Number of Students</div>
        </div>


      </div>

      <div class="card">
        <div class="iconBx">
          <ion-icon name="book-outline"></ion-icon>
        </div>
        <div>
          <div class="numbers"><?php echo $courseCount ?></div>
          <div class="cardName">Course Taught</div>
        </div>
      </div>

      <div class="card-calendar">
        <div class="iconBx">
          <a href=http://deliavs2.test/my></a>
          <ion-icon name="calendar"></ion-icon>
        </div>
        <div>
          <?php
          $cons = mysqli_connect("localhost", "root", "", "deliadata");

          if (!$cons) {
            die("Connection failed: " . mysqli_connect_error());
          }
          // Output upcoming events in the calendar
          $sql_events = "SELECT DISTINCT e.id, e.name, e.timestart, e.timeduration, e.eventtype, e.description, e.courseid
                                   FROM mdl_event e
                                   LEFT JOIN mdl_course c ON e.courseid = c.id
                                   LEFT JOIN mdl_context ctx ON c.id = ctx.instanceid AND ctx.contextlevel = 50
                                   LEFT JOIN mdl_role_assignments ra ON ctx.id = ra.contextid
                                   WHERE (e.userid = ? OR ra.userid = ?)
                                   AND e.timestart >= UNIX_TIMESTAMP()
                                   ORDER BY e.timestart ASC
                                   LIMIT 1";

          // fetch upcoming event from calendar
          $stmt_events = mysqli_prepare($cons, $sql_events);
          mysqli_stmt_bind_param($stmt_events, "ii", $USER->id, $USER->id);
          mysqli_stmt_execute($stmt_events);
          $result_events = mysqli_stmt_get_result($stmt_events);

          $events_found = false;

          // Display the events
          while ($event = mysqli_fetch_assoc($result_events)) {
            $events_found = true;  // Set flag to true if an event is found
            // Create a DateTime object from the Unix timestamp
            $event_date = new DateTime();
            $event_date->setTimestamp($event['timestart']);
            echo "<div class='event'>" . htmlspecialchars($event['name']) . "</div>";
            echo "<div class='cardName-event'>" . $event_date->format('j F Y g.i A') . "</div>";
          }

          // If no events were found, display a message
          if (!$events_found) {
            echo "<div class='cardName-event'>No event has been created</div>";
          }


          // Close the statement
          mysqli_stmt_close($stmt_events);
          ?>
        </div>
        <div class="cardName-event">Upcoming Event</div>
      </div>


    </div>

    <?php
global $CFG, $COURSE, $DB, $USER, $ROLE;

// Database connection
$conn = mysqli_connect("localhost", "root", "", "deliadata");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Teacher's username from the session
$teacherUsername = $USER->username;

// Fetch the courses taught by the specified teacher
$sql_courses = "SELECT c.id AS course_id, c.fullname AS course_name 
                FROM mdl_course c
                JOIN mdl_context ctx ON c.id = ctx.instanceid
                JOIN mdl_role_assignments ra ON ctx.id = ra.contextid
                JOIN mdl_user u ON ra.userid = u.id
                WHERE u.username = ? AND c.category !=0
                AND ctx.contextlevel = 50
                AND ra.roleid = 3"; // Assuming 3 is the role ID for teachers

$stmt_courses = mysqli_prepare($conn, $sql_courses);
if ($stmt_courses === false) {
    die("SQL prepare error: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt_courses, "s", $teacherUsername);
mysqli_stmt_execute($stmt_courses);
$result_courses = mysqli_stmt_get_result($stmt_courses);

if ($result_courses === false) {
    die("SQL execute error: " . mysqli_error($conn));
}

// Fetch courses into an array
$courses = [];
$course_ids = [];
while ($course = mysqli_fetch_assoc($result_courses)) {
    $courses[] = $course;
    $course_ids[] = $course['course_id'];
}

// Fetch all students under the teacher's courses by default
$students = [];
if (!empty($course_ids)) {
    $course_ids_placeholder = implode(',', array_fill(0, count($course_ids), '?'));
    $sql_students = "SELECT u.id, u.firstname, u.lastname, u.email, 
    GROUP_CONCAT(DISTINCT ctx.instanceid) as course_ids,
    GROUP_CONCAT(DISTINCT c.fullname SEPARATOR ', ') as courses
FROM mdl_user u
JOIN mdl_role_assignments ra ON u.id = ra.userid
JOIN mdl_context ctx ON ra.contextid = ctx.id
JOIN mdl_course c ON ctx.instanceid = c.id
JOIN mdl_user_enrolments ue ON ue.userid = u.id
JOIN mdl_enrol e ON e.id = ue.enrolid AND e.courseid = c.id
WHERE ctx.instanceid IN ($course_ids_placeholder) 
AND c.newsitems = 5  
AND ctx.contextlevel = 50
AND ra.roleid = 5
AND ue.status = 0
GROUP BY u.id, u.firstname, u.lastname, u.email";

    $stmt_students = mysqli_prepare($conn, $sql_students);
    if ($stmt_students === false) {
        die("SQL prepare error: " . mysqli_error($conn));
    }

    // Bind course IDs as parameters
    mysqli_stmt_bind_param($stmt_students, str_repeat('i', count($course_ids)), ...$course_ids);
    mysqli_stmt_execute($stmt_students);
    $result_students = mysqli_stmt_get_result($stmt_students);

    if ($result_students === false) {
        die("SQL execute error: " . mysqli_error($conn));
    }

    while ($student = mysqli_fetch_assoc($result_students)) {
        $students[] = $student;
    }
}

// Check if a course is selected and filter students
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['course_id'])) {
    $courseId = $_POST['course_id'];

    if (!empty($courseId)) {
        $students = array_filter($students, function($student) use ($courseId) {
            return in_array($courseId, explode(',', $student['course_ids']));
        });
    }
}

// Close the database connection
mysqli_stmt_close($stmt_students);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <!-- Include jQuery and DataTables CSS/JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
</head>
<body>

    <div class="details">
        <div class="student">
            <div class="cardHeader">
                <form method="post">
                    <h2 id="courseHeading">Student Name List</h2>
                    <select name="course_id" id="course">
                        <option value="">All Courses</option>
                        <?php foreach ($courses as $course) : ?>
                            <option value="<?php echo $course['course_id']; ?>" <?php echo (isset($_POST['course_id']) && $_POST['course_id'] == $course['course_id']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($course['course_name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn">Filter</button>
                </form>
            </div>
            <table id="example">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Student ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Courses</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($students as $student) :
                        $no++;
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo htmlspecialchars($student['id']); ?></td>
                            <td><?php echo htmlspecialchars($student['firstname']); ?></td>
                            <td><?php echo htmlspecialchars($student['lastname']); ?></td>
                            <td><?php echo htmlspecialchars($student['courses']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        title: 'Student data'
                    },
                    {
                        extend: 'excel',
                        title: 'Student data'
                    },
                    {
                        extend: 'pdf',
                        title: 'Student data'
                    }
                ]
            });
        });

        // Function to update the heading text
        function updateHeading() {
            // Get references to the select element and the h2 element
            var select = document.getElementById("course");
            var heading = document.getElementById("courseHeading");

            // Update the h2 text with the selected course name
            heading.textContent = "Student Name List for " + select.options[select.selectedIndex].text;
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Call the updateHeading function on page load
            updateHeading();

            // Get a reference to the select element
            var select = document.getElementById("course");

            // Add an event listener to the select element
            select.addEventListener("change", function() {
                // Call the updateHeading function when the select element changes
                updateHeading();
            });
        });
        document.getElementById('event-card').addEventListener('click', function() {
            var eventElement = document.querySelector('.event');
            if (eventElement) {
                var eventDate = eventElement.getAttribute('data-event-date');
                var calendarUrl = '/calendar.php?date=' + eventDate;
                window.location.href = calendarUrl;
            }
        });
    </script>

</body>
</html>

<?php
echo $OUTPUT->footer();
?>