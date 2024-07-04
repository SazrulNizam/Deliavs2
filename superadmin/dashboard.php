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


$courseurl = core_course_category::user_top() ? new moodle_url('/index.php') : null;
$PAGE->navbar->add("Home", $courseurl);
$PAGE->navbar->add('Dashboard', new moodle_url('/course/newpage.php'));


$PAGE->set_title("Dashboard");

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
$test = "SELECT *
FROM mdl_user_enrolments WHERE userid = 18 AND enrolid= 10";
$tests = mysqli_query($con,$test);
$datatest=mysqli_fetch_assoc($tests);
$conn =mysqli_connect("localhost","root","","deliadata");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$currentYear = date("Y");
$states = ["Johor", "Kedah", "Kelantan", "Melaka", "N.Sembilan", "Pahang", "Penang", "Perak", "Perlis", "Sabah", "Sarawak", "Selangor", "Terengganu"];
$months = range(1, 12);

// Query to fetch teachers
$query = "SELECT * FROM mdl_user INNER JOIN mdl_user_info_data ON mdl_user.id = mdl_user_info_data.userid WHERE data='Teacher'";
$result = mysqli_query($con, $query);
$totalTeachers = mysqli_num_rows($result);

// Fetch categories 
$categoriesQuery = $conn->query("SELECT id, name FROM mdl_course_categories");
$categoryCountQuery = $conn->query("SELECT COUNT(id) AS totalCategories FROM mdl_course_categories");
$categoryCount = $categoryCountQuery->fetch_assoc();
$totalCategories = $categoryCount['totalCategories'];

if (!$categoriesQuery) {
    die("Query failed: " . $conn->error);
}

$categoryData = [];

while ($row = $categoriesQuery->fetch_assoc()) {
    $categoryId = $row['id'];
    $categoryName = $row['name'];

    $stateData = [];

    // Fetch attendance data for each state and month within the current category
    foreach ($months as $month) {
        $monthData = [];

        // Fetch attendance data for each state
        foreach ($states as $stateName) {
            $query = "SELECT
                            c.id AS category_id,
                            c.name AS category_name,
                            MONTH(FROM_UNIXTIME(a.sessdate)) AS month,
                            YEAR(FROM_UNIXTIME(a.sessdate)) AS year,
                            uid1.data AS state_name,
                            COUNT(DISTINCT al.studentid) AS student_count,
                            COUNT(DISTINCT a.id) AS total_sessions,
                            SUM(CASE WHEN ast.acronym = 'P' THEN 1 ELSE 0 END) AS present_count
                        FROM
                            mdl_course_categories c
                        LEFT JOIN
                            mdl_course course ON c.id = course.category
                        LEFT JOIN
                            mdl_attendance att ON course.id = att.course
                        LEFT JOIN
                            mdl_attendance_sessions a ON att.id = a.attendanceid
                        LEFT JOIN
                            mdl_attendance_log al ON a.id = al.sessionid
                        LEFT JOIN
                            mdl_user u ON al.studentid = u.id
                        LEFT JOIN
                            mdl_attendance_statuses ast ON al.statusid = ast.id
                        LEFT JOIN
                            mdl_user_info_data uid1 ON u.id = uid1.userid AND uid1.fieldid = 1
                        WHERE
                            c.id = $categoryId
                            AND YEAR(FROM_UNIXTIME(a.sessdate)) = $currentYear
                            AND MONTH(FROM_UNIXTIME(a.sessdate)) = $month
                            AND uid1.data = '$stateName'
                        GROUP BY
                            c.id, c.name, MONTH(FROM_UNIXTIME(a.sessdate)), YEAR(FROM_UNIXTIME(a.sessdate)), uid1.data
                        ORDER BY
                            c.name ASC, MONTH(FROM_UNIXTIME(a.sessdate)) ASC";

            $result = $conn->query($query);

            if (!$result) {
                die("Query failed: " . $conn->error);
            }

            // Fetch and process attendance data
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $attendanceCount = $row['present_count'];
                $sessionCount = $row['total_sessions'];
                $studentCount = $row['student_count'];

                // Calculate percentage
                $percentage = ($sessionCount > 0 && $studentCount > 0) ? ($attendanceCount / ($sessionCount * $studentCount)) * 100 : 0;

                // Store data in $monthData array
                $monthData[$stateName] = [
                    'attendance_count' => $attendanceCount,
                    'session_count' => $sessionCount,
                    'percentage' => $percentage,
                ];
            } else {
                //Default data
                $monthData[$stateName] = [
                    'attendance_count' => 0,
                    'session_count' => 0,
                    'percentage' => 0,
                ];
            }
        }


        $stateData[$month] = $monthData;
    }

    $categoryData[$categoryName] = $stateData;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="dashboard.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
    <style>
        .chart-container {
            position: relative;
            width: 90%;
            height: 400px;
        }
    </style>
</head>
<body>
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
                <i class="fa fa-chalkboard-teacher"></i>
                    <span class="count-numbers"><?php echo $totalTeachers; ?></span>
                    <span class="count-name">Total Teachers</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter danger">
                    <i class="fa fa-list"></i>
                    <span class="count-numbers"><?php echo $totalCategories; ?></span>
                    <span class="count-name">Total Category</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter danger">
                    <i class="fa fa-book"></i>
                    <span class="count-numbers"><?php echo $allcourse['allcourse']; ?></span>
                    <span class="count-name">Total Sub-Course</span>
                </div>
            </div>
        </div>
    </div>

    <h2>Attendance Record by States</h2>
    <div class="container mt-5">
    <?php foreach ($categoryData as $categoryName => $stateData) { ?>
        <h2><?php echo htmlspecialchars($categoryName); ?></h2>
        <ul class="nav nav-tabs" role="tablist">
            <?php
            $monthCount = count($months);
            for ($i = 0; $i < $monthCount; $i++):
                $month = $months[$i];
            ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $i === 0 ? 'active' : ''; ?>" data-toggle="tab"
                    href="#tab-<?php echo str_replace(' ', '', $categoryName); ?>-<?php echo $month; ?>">
                    <?php echo date('F', mktime(0, 0, 0, $month, 1)); ?>
                </a>
            </li>
            <?php endfor; ?>
        </ul>
        <div class="tab-content">
            <?php for ($i = 0; $i < $monthCount; $i++):
                $month = $months[$i];
            ?>
            <div id="tab-<?php echo str_replace(' ', '', $categoryName); ?>-<?php echo $month; ?>"
                class="tab-pane fade <?php echo $i === 0 ? 'show active' : ''; ?>">
                <div class="chart-container">
                    <canvas id="myChart-<?php echo str_replace(' ', '', $categoryName); ?>-<?php echo $month; ?>"></canvas>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        <hr>
    <?php } ?>
</div>

   
  
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    
    <script>


        document.addEventListener("DOMContentLoaded", function () {
            <?php foreach ($categoryData as $categoryName => $stateData): ?>
                <?php foreach ($stateData as $month => $data): ?>
                    new Chart(document.getElementById("myChart-<?php echo str_replace(' ', '', $categoryName); ?>-<?php echo $month; ?>"), {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode(array_keys($data)); ?>,
                            datasets: [{
                                label: 'Attendance Percentage - <?php echo htmlspecialchars($categoryName); ?>, Month: <?php echo date('F', mktime(0, 0, 0, $month, 1)); ?>',
                                data: <?php echo json_encode(array_column($data, 'percentage')); ?>,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 100
                                }
                            }
                        }
                    });
                <?php endforeach; ?>
            <?php endforeach; ?>
        });
    </script>
  <?php echo $OUTPUT->footer();?>
</body>
</html>
