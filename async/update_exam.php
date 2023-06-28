<?php
include('../includes/functions.php');

$exam_id = $_POST['exam_id'];
$exam_title = $_POST['exam_title'];
$exam_date = $_POST['exam_date'];
$start_time = $_POST['start_time'];
$finish_time = $_POST['finish_time'];
$exam_desc = $_POST['exam_desc'];

$exam_id = escapeString($exam_id);
$exam_title = escapeString($exam_title);
$exam_date = escapeString($exam_date);
$start_time =escapeString($start_time);
$finish_time = escapeString($finish_time);
$exam_desc = escapeString($exam_desc);


$query = "UPDATE exams SET exam_title = '$exam_title', exam_date = '$exam_date', start_time = '$start_time', finish_time = '$finish_time', exam_desc = '$exam_desc' WHERE exam_id = $exam_id ";
$update_exam = mysqli_query($connection,$query);
checkQuery($update_exam);


?>