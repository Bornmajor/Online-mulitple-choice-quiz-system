<?php
include('../includes/functions.php');

$quiz_id = $_POST['quiz_id'];
$quiz_id = escapeString($quiz_id);


if(isset($quiz_id)){

//delete ans related to quiz
$query = "DELETE FROM answers WHERE quiz_id = $quiz_id";
$delete_ans_quiz = mysqli_query($connection,$query);
checkQuery($delete_ans_quiz);

 $query = "DELETE FROM questions WHERE quiz_id = $quiz_id";
 $delete_quiz = mysqli_query($connection,$query);
 checkQuery($delete_quiz);
}


?>