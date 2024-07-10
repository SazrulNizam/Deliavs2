<?php
require_once("../config.php");
require_once($CFG->dirroot . '/course/lib.php');

$q = optional_param('q', '', PARAM_RAW);       
$search = optional_param('search', '', PARAM_RAW);  
$page = optional_param('page', 0, PARAM_INT);     
$perpage = optional_param('perpage', '', PARAM_RAW); 
$blocklist = optional_param('blocklist', 0, PARAM_INT);
$modulelist = optional_param('modulelist', '', PARAM_PLUGIN);
$tagid = optional_param('tagid', '', PARAM_INT);   

$PAGE->set_heading('Student Report Card');
$PAGE->set_title('Report Card');
$PAGE->requires->css(new \moodle_url('https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css'));
$PAGE->requires->css(new \moodle_url('https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap4.css'));

global $CFG, $COURSE, $DB, $USER, $ROLE;
$con = mysqli_connect("localhost", "root", "", "deliadata");

echo $OUTPUT->header();

$conn = new mysqli("localhost", "root", "", "deliadata");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <h3><?php echo htmlspecialchars($students[0]['category_name']); ?></h3>
    <form method="post" id="courseForm-<?php echo $category_id; ?>">
        <select name="course_id" id="course-<?php echo $category_id; ?>" class="form-control course-select" data-category-id="<?php echo $category_id; ?>">
            <option value="">All Courses</option>
            <?php foreach ($courses_by_category[$category_id] as $course_id => $course_name) : ?>
                <option value="<?php echo $course_id; ?>" <?php echo (isset($_POST['course_id']) && $_POST['course_id'] == $course_id) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($course_name); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
    <br>
    <div class="table-container">
        <table id="example-<?php echo $category_id; ?>" class="table table-hover course-table" data-category-id="<?php echo $category_id; ?>" style="width:100%">
            <thead>
                <tr>
                    <td>No</td>
                    <td hidden>Student ID</td>
                    <td>Student Name</td>
                    <td>Course</td>
                    <td>Nadi Name</td>
                    <td hidden>Course ID</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
    <?php
    $no = 0;
    foreach ($students as $student) :
        $no++;
        $record = $DB->get_record('local_reportcards', array('userid' => $student['id'], 'courseid' => $student['course_id']));
        if ($record && $record->status === 'uploaded') {
            $status_class = 'btn-success';
            $status_text = 'Uploaded';
            $actions = "class='dropdown-item' href='upload/download.php?id=$record->file'";
        } else {
            $status_class = 'btn-danger';
            $status_text = 'Not Uploaded';
            $actions = '';
        }
    ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td hidden><?php echo htmlspecialchars($student['id']); ?></td>
                <td><?php echo htmlspecialchars($student['firstname'] . ' ' . $student['lastname']); ?></td>
                <td><?php echo htmlspecialchars($student['course_name']); ?></td>
                <td><?php echo htmlspecialchars($student['nadi_name']); ?></td>
                <td hidden><?php echo htmlspecialchars($student['course_id']); ?></td>
                <td><a type="button" class="btn <?php echo $status_class; ?>" <?php echo $actions; ?>><?php echo $status_text; ?></a></td>
            </tr>
    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endforeach; ?>


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
    }

    //intialized datatable
    $('.course-table').each(function() {
        $(this).DataTable();
    });

     // Show action columns if a specific course is already selected on page load
    $('.course-select').each(function() {
        var initialSelectedCourse = $(this).val();
        var categoryId = $(this).data('category-id');
        selectedCourses[categoryId] = initialSelectedCourse;
        updateTableVisibility(categoryId, initialSelectedCourse);
    });

    // Restore selected courses when page loads or is refreshed
    Object.keys(selectedCourses).forEach(function(categoryId) {
        $('#course-' + categoryId).val(selectedCourses[categoryId]);
    });
});
</script>

</body>
</html>

<?php
echo $OUTPUT->footer();
?>
