<?php
include('../includes/functions.php');

$u_id = getU_id($_SESSION['usr_id']);

$exam_title = $_POST['exam_title'];
$exam_date = $_POST['exam_date'];
$start_time = $_POST['start_time'];
$finish_time = $_POST['finish_time'];

$exam_title = escapeString($exam_title);
$exam_date = escapeString($exam_date);
$start_time =escapeString($start_time);
$finish_time = escapeString($finish_time);

$enrolment_key = generateEnrolmentKey();


$query= "INSERT INTO exams(exam_title,exam_date,start_time,finish_time,u_id,enrolment_key)VALUES('$exam_title','$exam_date','$start_time','$finish_time','$u_id','$enrolment_key')";
$create_exam = mysqli_query($connection,$query);
checkQuery($create_exam);
if($create_exam){
    successMsg('Exam created');
    // successMsg('Redirecting');

    echo "<script>
    window.setTimeout(function() {
        window.location = '?component=exam_set';
        }, 2000);
       </script> ";
       
    }
?>
