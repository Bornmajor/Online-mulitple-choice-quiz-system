<?php
include('../includes/functions.php');

if(isset($_SESSION['usr_id'])){

$ans_id =$_POST['ans_id'];
$exam_id = $_POST['exam_id'];
$quiz_id = $_POST['quiz_id'];
$usr_id = $_SESSION['usr_id'];


$exam_id = escapeString($exam_id);
$ans_id = escapeString($ans_id);
$usr_id = escapeString($usr_id);
$quiz_id = escapeString($quiz_id);

$u_id = getU_id($usr_id);

$query = "SELECT * FROM users_answers WHERE ans_id =  $ans_id AND u_id = $u_id";
$select_quiz = mysqli_query($connection,$query);
checkQuery($select_quiz);
while($row = mysqli_fetch_assoc($select_quiz)){
   $db_ans_id = $row['ans_id'];

}

//select points
$query = "SELECT * FROM answers WHERE ans_id = $ans_id";
$select_points = mysqli_query($connection,$query);
checkQuery($select_points);
while($row = mysqli_fetch_assoc($select_points)){
   $points = $row['points'];

}

if(!isset($db_ans_id)){
    
$query = "SELECT * FROM questions WHERE quiz_id = $quiz_id";
$select_choice_type = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_choice_type)){
   $choices = $row['choices'];

} 
if($choices == 'single_choice'){
    //delete single choice if already exist
    $query = "DELETE FROM users_answers WHERE quiz_id = $quiz_id AND u_id = $u_id";
    $delete_previous_ans = mysqli_query($connection,$query);

}

$query = "INSERT INTO users_answers(ans_id,exam_id,u_id,quiz_id,points)VALUES($ans_id,$exam_id,$u_id,$quiz_id,$points)"; 
$insert_ans = mysqli_query($connection,$query);
}



}



?>