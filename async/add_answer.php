<?php
include('../includes/functions.php');

$exam_id = $_POST['exam_id'];
$quiz_id = $_POST['quiz_id'];
$answer = $_POST['answer'];
$ans_status = $_POST['ans_status'];

$exam_id = escapeString($exam_id);
$quiz_id = escapeString($quiz_id);
$answer = escapeString($answer);
$ans_status = escapeString($ans_status);

if(empty($ans_status )){
    $ans_status  = 'incorrect';
}

$query = "SELECT * FROM questions WHERE quiz_id = $quiz_id";
$select_quiz = mysqli_query($connection,$query);
checkQuery($select_quiz);
while($row = mysqli_fetch_assoc($select_quiz)){
    $quiz_points  = $row['quiz_points'];

}
if($ans_status == 'correct'){
 $points = $quiz_points;
}else{
 $points = 0;
}

$query = "INSERT INTO answers(answer,quiz_id,ans_status,points,exam_id)VALUES('$answer','$quiz_id','$ans_status',$points,$exam_id)";
$insert_answer = mysqli_query($connection,$query);
checkQuery($insert_answer);

?>