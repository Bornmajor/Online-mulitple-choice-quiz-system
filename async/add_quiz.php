<?php
include('../includes/functions.php');

$exam_id = $_POST['exam_id'];
$quiz_title = $_POST['quiz_title'];
$choices = $_POST['choices'];
$quiz_points = $_POST['quiz_points'];

$exam_id = escapeString($exam_id);
$quiz_title = escapeString($quiz_title);
$choices = escapeString($choices);
$quiz_points = escapeString($quiz_points);

if(empty($choices)){
    $choices = 'single_choice';
}

$query = "INSERT INTO  questions(quiz_title,exam_id,choices,quiz_points)VALUES('$quiz_title','$exam_id','$choices','$quiz_points')";
$insert_quiz = mysqli_query($connection,$query);
checkQuery($insert_quiz);

?>