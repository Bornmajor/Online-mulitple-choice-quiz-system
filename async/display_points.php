<?php
include('../includes/functions.php');

$exam_id = $_POST['exam_id'];
$exam_id = escapeString($exam_id);

  $query = "SELECT SUM(points) FROM answers WHERE exam_id = $exam_id";
  $select_total_points = mysqli_query($connection,$query);
  checkQuery($select_total_points);
  while($row = mysqli_fetch_assoc($select_total_points)){
    $total_points  = $row['SUM(points)'] ;
  }

echo $total_points." pts";

?>