<?php
require_once("../config.php");
require_once($CFG->dirroot . '/course/lib.php');

$q = optional_param('q', '', PARAM_RAW);       // Global search words.
$search = optional_param('search', '', PARAM_RAW);  // search words
$page = optional_param('page', 0, PARAM_INT);     // which page to show
$perpage = optional_param('perpage', '', PARAM_RAW); // how many per page, may be integer or 'all'
$blocklist = optional_param('blocklist', 0, PARAM_INT);
$modulelist = optional_param('modulelist', '', PARAM_PLUGIN);
$tagid = optional_param('tagid', '', PARAM_INT);   // searches for courses tagged with this tag id

$PAGE->set_heading('Student Report Card');
$PAGE->set_title('Report Card');
$PAGE->requires->css(new \moodle_url('https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css'));
$PAGE->requires->css(new \moodle_url('https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap4.css'));

global $CFG, $COURSE, $DB, $USER, $ROLE;
$con = mysqli_connect("localhost", "root", "", "deliadata");

echo $OUTPUT->header();

// Establish database connection
$conn = new mysqli("localhost", "root", "", "deliadata");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch categories and students
$userRegister = $USER->id;

$sql_students = "SELECT ka.id, ka.firstname, ka.lastname, c.id AS course_id, c.fullname AS course_name, nadi.data AS nadi_name, cc.id AS category_id, cc.name AS category_name
    FROM mdl_user ka
    JOIN mdl_user_enrolments ra ON ka.id = ra.userid
    JOIN mdl_enrol en ON ra.enrolid = en.id
    JOIN mdl_course c ON en.courseid = c.id
    JOIN mdl_user_info_data role ON ka.id = role.userid AND role.fieldid = 6 AND role.data = 'Student'
    LEFT JOIN mdl_user_info_data nadi ON ka.id = nadi.userid AND nadi.fieldid = 14
    JOIN mdl_course_categories cc ON cc.id = c.category
    WHERE en.status = 0 AND role.data = 'Student' AND ka.phone1 = ?
    GROUP BY ka.id, ka.firstname, ka.lastname, c.id, c.fullname, nadi.data, cc.id, cc.name";

$stmt = $conn->prepare($sql_students);
if ($stmt === false) {
    die("Query preparation failed: " . $conn->error);
}
$stmt->bind_param("s", $userRegister);
$stmt->execute();
$result_students = $stmt->get_result();
if ($result_students === false) {
    die("Query failed: " . $conn->error);
}

$students_by_category = [];
$courses_by_category = [];
while ($student = $result_students->fetch_assoc()) {
    $students_by_category[$student['category_id']][] = $student;
    $courses_by_category[$student['category_id']][$student['course_id']] = $student['course_name'];
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <style>
        .table-container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <?php foreach ($students_by_category as $category_id => $students) : ?>
        <div class="table-container">
            <h3><?php echo htmlspecialchars($students[0]['category_name']); ?></h3>
            
            <!-- Course Filter Dropdown for each table -->
            <label for="courseFilter<?php echo $category_id; ?>">Filter by Course:</label>
            <select id="courseFilter<?php echo $category_id; ?>" class="courseFilter" data-table-id="example<?php echo $category_id; ?>">
                <option value="">All Courses</option>
                <?php 
                foreach ($courses_by_category[$category_id] as $course_id => $course_name) {
                    echo '<option value="' . htmlspecialchars($course_name) . '">' . htmlspecialchars($course_name) . '</option>';
                }
                ?>
            </select>

            <table id="example<?php echo $category_id; ?>" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td hidden>Student ID</td>
                        <td>Student Name</td>
                        <td class="course">Course</td>
                        <td hidden>Course ID</td>
                        <td>Nadi Name</td>
                        <td>Status</td>
                        <td class="action-column hidden">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($students as $student) :
                        $no++;
                        // Fetch the status for each student
                        $record = $DB->get_record('local_reportcards', array('userid' => $student['id'], 'courseid' => $student['course_id']));
                        if ($record && $record->status === 'uploaded') {
                            $status_class = 'btn-success';
                            $status_text = 'View';
                            $view_link = "upload/view.php?id={$student['id']}&course_id={$student['course_id']}";
                        } else {
                            $status_class = 'btn-danger';
                            $status_text = 'Not Uploaded';
                        }
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td hidden><?php echo htmlspecialchars($student['id']); ?></td>
                        <td><?php echo htmlspecialchars($student['firstname'] . ' ' . $student['lastname']); ?></td>
                        <td class="course"><?php echo htmlspecialchars($student['course_name']); ?></td>
                        <td hidden><?php echo htmlspecialchars($student['course_id']); ?></td>
                        <td><?php echo htmlspecialchars($student['nadi_name']); ?></td>
                        <td><a href="<?php echo $view_link; ?>" class="btn <?php echo $status_class; ?>" action="view"><?php echo $status_text; ?></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
        </div>
    <?php endforeach; ?>

    <script>
        $(document).ready(function() {
            <?php foreach ($students_by_category as $category_id => $students) : ?>
                var table = $('#example<?php echo $category_id; ?>').DataTable();

                // Filter event handler for this table
                $('#courseFilter<?php echo $category_id; ?>').on('change', function() {
                    var selectedCourse = $(this).val();
                    if (selectedCourse) {
                        table.columns('.course').search('^' + selectedCourse + '$', true, false).draw();
                    } else {
                        table.columns('.course').search('').draw();
                    }
                });
            <?php endforeach; ?>
        });
    </script>
</body>
</html>

<?php
echo $OUTPUT->footer();
?>
