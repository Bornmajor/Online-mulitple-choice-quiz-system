<?php
include('../includes/functions.php');

$exam_id = $_POST['exam_id'];
$exam_id = escapeString($exam_id);

$u_id = getU_id($_SESSION['usr_id']);

//get total points
$query = "SELECT SUM(points) FROM answers WHERE exam_id = $exam_id";
$select_total_points = mysqli_query($connection,$query);
checkQuery($select_total_points);
while($row = mysqli_fetch_assoc($select_total_points)){
  $total_points  = $row['SUM(points)'] ;
}

//get users total points
$query = "SELECT  SUM(points) FROM users_answers WHERE exam_id = $exam_id AND u_id = $u_id";
$select_users_total_points = mysqli_query($connection,$query);
checkQuery($select_users_total_points);
while($row = mysqli_fetch_assoc($select_users_total_points)){
    $users_total_points = $row['SUM(points)'];

}

//check if answered all quiz
//total quiz by exam
$query = "SELECT * FROM  questions WHERE exam_id = $exam_id";
$select_questions = mysqli_query($connection,$query);
checkQuery($select_questions);
$total_questions = mysqli_num_rows($select_questions);

//total answers by users
$query = "SELECT * FROM users_answers WHERE u_id = $u_id AND exam_id = $exam_id";
$select_answers = mysqli_query($connection,$query);
checkQuery($select_answers);
$total_user_answers = mysqli_num_rows($select_answers);

if($total_user_answers >= $total_questions){

$query = "SELECT * FROM results WHERE u_id = $u_id AND exam_id = $exam_id";
$select_u_id = mysqli_query($connection,$query);
checkQuery($select_u_id);
while($row = mysqli_fetch_assoc($select_u_id)){
  $db_u_id = $row['u_id'];
  $score = $row['score'];

}
if(isset($db_u_id)){
failMsg("Exam already submitted");
warnMsg('Your final score '.$score. " | ".$total_points);
}else{

$score = $users_total_points;
$query = "INSERT INTO results(u_id,exam_id,score)VALUES($u_id,$exam_id,$score)";
$insert_result = mysqli_query($connection,$query);
if($insert_result){
  successMsg('Your final score '.$users_total_points. " | ".$total_points);

//disable inputs
echo '<script>
$(".usr_option_input").prop("disabled",true);
$(".submit_exam").html("Already attempted!!").prop("disabled",true);


window.setTimeout(function() {
location.reload(true);
  }, 3000);
  
</script>';

}
}


}else{
    failMsg('Need to attempt all questions');
}


?>