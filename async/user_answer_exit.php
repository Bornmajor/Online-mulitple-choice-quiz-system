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

$query = "DELETE FROM users_answers WHERE ans_id = $ans_id AND u_id = $u_id";
$delete_query = mysqli_query($connection,$query);
checkQuery($delete_query);
}

?>