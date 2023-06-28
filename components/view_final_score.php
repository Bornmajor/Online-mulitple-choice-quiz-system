<?php
$stud_u_id = getU_id($_SESSION['usr_id']);
$query = "SELECT * FROM results WHERE u_id = $stud_u_id AND exam_id = $exam";
$select_user_result = mysqli_query($connection,$query);
checkQuery($select_user_result);

if(mysqli_num_rows($select_user_result) > 0){

//get total points
$query = "SELECT SUM(points) FROM answers WHERE exam_id = $exam";
$select_total_points = mysqli_query($connection,$query);
checkQuery($select_total_points);
while($row = mysqli_fetch_assoc($select_total_points)){
  $total_points  = $row['SUM(points)'] ;
}

$query = "SELECT * FROM results WHERE u_id = $u_id AND exam_id = $exam";
$select_u_id = mysqli_query($connection,$query);
checkQuery($select_u_id);
while($row = mysqli_fetch_assoc($select_u_id)){
  $db_u_id = $row['u_id'];
  $score = $row['score'];

}
warnMsg('Your final score '.$score. " | ".$total_points);

}

?>