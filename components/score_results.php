<title>
<?php

if(isset($_GET['exam_id'])){
$exam_id = $_GET['exam_id'];  

$query = "SELECT * FROM exams WHERE exam_id = $exam_id";
$select_title = mysqli_query($connection,$query);
checkQuery($select_title);
while($row = mysqli_fetch_assoc($select_title)){
  $exam_title =  $row['exam_title'];
  $exam_date = $row['exam_date'];
}
echo $exam_title;
}else{
    header("Location: ?components=home");
}
?>
</title>
<meta name="description" content="STUDENT">
</head>
<body>
<style>
.container{
    margin-bottom:200px; 
}
</style>

<?php include('includes/navbar.php'); ?>

<div class="container"><!--container-->

<div class="exam_details" style='margin-top:20px;'>
  <div style='font-weight:600;font-size:20px;'><?php echo  $exam_title; ?></div>
  <div style='font-weight:600;font-size:18px;'><?php echo  $exam_date; ?></div>
</div>

<table class="table table-striped">
    <tr>
  <th>Student</th>
  <th>Score</th>
  </tr>
  <?php
  //get total points
    $query = "SELECT SUM(points) FROM answers WHERE exam_id = $exam_id";
    $select_total_points = mysqli_query($connection,$query);
    checkQuery($select_total_points);
    while($row = mysqli_fetch_assoc($select_total_points)){
    $total_points  = $row['SUM(points)'] ;
    }



  $query = "SELECT * FROM results WHERE exam_id = $exam_id";
  $select_result = mysqli_query($connection,$query);
  checkQuery($select_result);
  while($row = mysqli_fetch_assoc($select_result)){
   $u_id = $row['u_id'];
   $score = $row['score'];
   ?>
    <tr>
        <td><?php echo getUsernameFromU_id($u_id); ?></td>
        <td><?php echo $score; ?> | <?php echo $total_points;  ?></td>
    </tr>
   <?php

  }
  ?>


</table>

</div><!--container-->
