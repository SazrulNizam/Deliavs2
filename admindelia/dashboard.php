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

$adminid = $USER->id;
$currentYear = date("Y");
$months = range(1, 12);

// Fetch categories 
$categoriesQuery = $conn->query("SELECT id, name FROM mdl_course_categories");
$categoryCountQuery = $conn->query("SELECT COUNT(id) AS totalCategories FROM mdl_course_categories");
$categoryCount = $categoryCountQuery->fetch_assoc();
$totalCategories = $categoryCount['totalCategories'];

if (!$categoriesQuery) {
    die("Query failed: " . $conn->error);
}

$categoryData = [];
$students = [];

// Fetch all students registered under nadi
$studentsQuery = "SELECT DISTINCT u.id AS student_id, CONCAT(u.firstname, ' ', u.lastname) AS student_name, u.email
                  FROM mdl_user u
                  LEFT JOIN mdl_user_info_data nadi ON u.id = nadi.userid AND nadi.fieldid = 14
                  LEFT JOIN mdl_user_info_data admin_nadi ON $adminid = admin_nadi.userid AND admin_nadi.fieldid = 14
                  LEFT JOIN mdl_role_assignments ra ON u.id = ra.userid
                  LEFT JOIN mdl_role r ON ra.roleid = r.id
                  WHERE nadi.data = admin_nadi.data AND u.deleted = 0 AND r.shortname = 'Student'";
$studentsResult = $conn->query($studentsQuery);

if (!$studentsResult) {
    die("Query failed: " . $conn->error);
}

while ($row = $studentsResult->fetch_assoc()) {
    $students[] = $row;
}

while ($row = $categoriesQuery->fetch_assoc()) {
    $categoryId = $row['id'];
    $categoryName = $row['name'];

    $monthlyAttendanceData = [];

    foreach ($months as $month) {
        $attendanceData = [];

        foreach ($students as $student) {
            $studentId = $student['student_id'];
            $studentName = $student['student_name'];

            //query to fetch and calculate percentage of student attendance for that nadi
            $query = "SELECT
                (SUM(CASE WHEN ast.acronym = 'P' THEN 1 ELSE 0 END) / COUNT(DISTINCT a.id)) * 100 AS attendance_percentage
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
                mdl_user_info_data nadi ON u.id = nadi.userid AND nadi.fieldid = 14
            LEFT JOIN
                mdl_user_info_data admin_nadi ON $adminid = admin_nadi.userid AND admin_nadi.fieldid = 14
            WHERE
                c.id = $categoryId
                AND c.id !=1
                AND YEAR(FROM_UNIXTIME(a.sessdate)) = $currentYear
                AND MONTH(FROM_UNIXTIME(a.sessdate)) = $month
                AND u.id = $studentId
                AND nadi.data = admin_nadi.data
            GROUP BY
                u.id";

            $result = $conn->query($query);

            $attendancePercentage = 0;
            if ($result) {
                $data = $result->fetch_assoc();
                if ($data) {
                    $attendancePercentage = $data['attendance_percentage'];
                }
            }

            $attendanceData[] = [
                'student_name' => $studentName,
                'attendance_percentage' => $attendancePercentage
            ];
        }

        $monthlyAttendanceData[$month] = $attendanceData;
    }

    $categoryData[$categoryName] = $monthlyAttendanceData;
}


$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="dashboard.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
    <style>
        .chart-container {
            position: relative;
            width: 90%;
            height: 400px;
        }

        #example th {
            text-align: center;
        }

        #example td {
            text-align: center;
        }
    </style>
</head>
<body>

    <h2>Student Attendance Record </h2>
    <div class="container mt-5">
        <?php foreach ($categoryData as $categoryName => $monthlyAttendanceData): ?>
        <h2><?php echo htmlspecialchars($categoryName); ?></h2>
        <ul class="nav nav-tabs" role="tablist">
            <?php foreach ($months as $index => $month): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $index === 0 ? 'active' : ''; ?>" data-toggle="tab"
                    href="#tab-<?php echo htmlspecialchars($categoryName); ?>-<?php echo $month; ?>">
                    <?php echo date('F', mktime(0, 0, 0, $month, 1)); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="tab-content">
            <?php foreach ($months as $index => $month): ?>
            <div id="tab-<?php echo htmlspecialchars($categoryName); ?>-<?php echo $month; ?>"
                class="tab-pane fade <?php echo $index === 0 ? 'show active' : ''; ?>">
                <div class="chart-container">
                    <canvas id="attendanceChart-<?php echo htmlspecialchars($categoryName); ?>-<?php echo $month; ?>"></canvas>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <hr>
        <?php endforeach; ?>
    </div>

    <h2>Students Details</h2>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th style="text-align:center;">No.</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through your student data and output rows
            foreach ($students as $student) {
                $no++;
                echo "<tr>
                        <td style='text-align:center;'>{$no}</td>
                        <td>{$student['student_name']}</td>
                        <td>{$student['email']}</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

<script id="categoryData" type="application/json"><?php echo json_encode($categoryData); ?></script>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
        <?php foreach ($categoryData as $categoryName => $monthlyData): ?>
            <?php foreach ($monthlyData as $month => $attendanceData): ?>
                var ctx = document.getElementById('attendanceChart-<?php echo htmlspecialchars($categoryName); ?>-<?php echo $month; ?>');
                console.log('Canvas element:', ctx);

                if (ctx) {  // Check if canvas element exists
                    var labels = <?php echo json_encode(array_column($attendanceData, 'student_name')); ?>;
                    var data = <?php echo json_encode(array_column($attendanceData, 'attendance_percentage')); ?>;
                    console.log('Labels:', labels);
                    console.log('Data:', data);

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Attendance Percentage',
                                data: data,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            <?php endforeach; ?>
        <?php endforeach; ?>
    });
</script>
    <script>
    $('#example').DataTable({
        lengthMenu: [10, 25, 50, { label: 'All', value: -1 }],
        layout: {
            top2Start: { 
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

   
  <?php echo $OUTPUT->footer();?>
</body>
</html>
