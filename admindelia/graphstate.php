<?php
$con = mysqli_connect("localhost", "root", "", "deliadata");

$currentyear = date("Y");

// Initialize an array with states and months
$states = ["Kedah", "Kelantan", "Melaka", "N.Sembilan", "Pahang", "Penang", "Perak", "Perlis", "Sabah", "Sarawak", "Selangor", "Terengganu"];
$months = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
$stateCounts = [];

// Fetch attendance counts for each state and month
foreach ($states as $stateName) {
    $stateCounts[$stateName] = array_fill_keys($months, 0);

    for ($month = 1; $month <= 12; $month++) {
        // Query to count attendance sessions for students from the current state and month
        $query = "
            SELECT
                COUNT(al.id) AS present_count
            FROM
                mdl_user u
            JOIN
                mdl_user_info_data uid1 ON u.id = uid1.userid AND uid1.data = '$stateName' AND uid1.fieldid = 1
            JOIN
                mdl_user_info_data uid2 ON u.id = uid2.userid AND uid2.data = 'Student' AND uid2.fieldid = 2
            LEFT JOIN
                mdl_attendance_log al ON u.id = al.studentid
            LEFT JOIN
                mdl_attendance_sessions a ON al.sessionid = a.id
            JOIN
                mdl_attendance att ON a.attendanceid = att.id
            JOIN
                mdl_attendance_statuses ast ON al.statusid = ast.id AND ast.acronym = 'P'
            WHERE
                YEAR(FROM_UNIXTIME(u.timecreated)) = $currentyear
                AND MONTH(FROM_UNIXTIME(a.sessdate)) = '$month'
        ";

        $result = mysqli_query($con, $query);
        $attendanceCount = mysqli_fetch_assoc($result)['present_count'];

        // Add attendance count to the corresponding state and month
        $stateCounts[$stateName][str_pad($month, 2, '0', STR_PAD_LEFT)] = $attendanceCount;
    }
}

// Output the results as JSON
header('Content-Type: application/json');
echo json_encode($stateCounts);
?>
