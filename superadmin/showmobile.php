<?php
$con =mysqli_connect("localhost","root","","deliadata");

$k = $_POST['id'];
$k = trim($k);

$month = date("m");

$no = 0;
//course

if($k == "all"){
    $querys = "SELECT * FROM mdl_course WHERE category !=0";
    $results = mysqli_query($con,$querys);
}
else{
$querys = "SELECT * FROM mdl_course WHERE category = $k ";
$results = mysqli_query($con,$querys);
}
while ($row2 = $results->fetch_assoc()) {
    $yes = 0;

    $no++;


    echo
        "<tr>
<td>" . $no . "</td>
<td>" . $row2["fullname"] . "</td>
<td>" . $row2["shortname"] . "</td>";

    $studentcourse = "SELECT *
    FROM mdl_user_enrolments INNER JOIN mdl_enrol ON mdl_user_enrolments.enrolid = mdl_enrol.id ";
    $stcourses = mysqli_query($con, $studentcourse);
    while ($row = $stcourses->fetch_assoc()) {
        $bulan = date('m',$row["timestart"]);
        if ($row["courseid"] == $row2["id"]) {

            $query3 = "SELECT *
            FROM mdl_user INNER JOIN mdl_user_info_data ON mdl_user.id = mdl_user_info_data.userid WHERE data='Student'";
            $result3 = mysqli_query($con, $query3);
            while ($row3 = $result3->fetch_assoc()) {

                if ($row3["userid"] == $row["userid"]) {
                    $yes++;

                }
            }
        }
    }
    echo "<td>" . $yes . "</td>

</tr>";

}
?>

<script>

    $('#example').DataTable({
        layout: {
            topStart: {
                buttons: [
                    {
                        extend: 'csv',
                        filename: 'Student data'
                    },
                    {
                        extend: 'excel',
                        filename: 'Student data'
                    },
                    {
                        extend: 'pdf',
                        filename: 'Student data'
                    }
                ]
            }
        }
    });

    $('#examplee').DataTable({
        layout: {
            topStart: {
                buttons: [
                    {
                        extend: 'csv',
                        filename: 'Course report'
                    },
                    {
                        extend: 'excel',
                        filename: 'Course report'
                    },
                    {
                        extend: 'pdf',
                        filename: 'Course report'
                    }
                ]
            }
        }
    });




</script>