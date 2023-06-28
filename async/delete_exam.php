<?php
include('../includes/functions.php');

$exam_id = $_POST['exam_id'];
$exam_id = escapeString($exam_id);

$u_id = getU_id($_SESSION['usr_id']);


//delete answers related with question
$query = "SELECT * FROM questions WHERE exam_id = $exam_id";
$select_quiz = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_quiz)){
$quiz_id = $row['quiz_id'];

$query = "DELETE FROM answers WHERE quiz_id = $quiz_id";
$delete_answers = mysqli_query($connection,$query);

}

//delete related questions
$query = "DELETE FROM questions WHERE exam_id = $exam_id";
$delete_questions_exam = mysqli_query($connection,$query);


$query = "DELETE FROM exams WHERE exam_id = $exam_id AND u_id = $u_id";
$delete_exam = mysqli_query($connection,$query);
?>