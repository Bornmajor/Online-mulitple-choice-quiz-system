<title>
 My results
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

<div class="container">

<?php
$u_id = getU_id($_SESSION['usr_id']);

$u_id = escapeString($u_id);

$query = "SELECT * FROM results WHERE u_id = $u_id";
$select_user_results = mysqli_query($connection,$query);
checkQuery($select_user_results);

while($row = mysqli_fetch_assoc($select_user_results)){
   $exam_id =  $row['exam_id'];
   $score = $row['score'];
?>
<div class="card exam_set_item" style="width: 18rem;">
  <div class="card-body">
    <?php
    $query = "SELECT * FROM exams WHERE exam_id = $exam_id";
    $select_title = mysqli_query($connection,$query);
    checkQuery($select_title);
    while($row = mysqli_fetch_assoc($select_title)){
     $exam_title = $row['exam_title'];
     $enrolment_key =$row['enrolment_key'];

    }

    ?>
    <h5 class="card-title"><?php echo $exam_title ?></h5>

    <h6 class="card-subtitle mb-2 text-muted">

     <?php
     //get total points
    $query = "SELECT SUM(points) FROM answers WHERE exam_id = $exam_id";
    $select_total_points = mysqli_query($connection,$query);
    checkQuery($select_total_points);
    while($row = mysqli_fetch_assoc($select_total_points)){
    $total_points  = $row['SUM(points)'] ;
    }
 echo  'Your score is '.$score. " | ".$total_points;
     ?>   
   
    </h6>
    <a class="btn btn-success" href='?component=sessions&enroll_key=<?php echo $enrolment_key ?>&exam=<?php echo $exam_id; ?>'> <i class="fas fa-poll"></i> View response</a>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    <!-- <a href="#" class="card-link">Another link</a> -->
  </div>
</div>
<?php
}
echo emptyTableRowMsg($select_user_results,'No results');





?>
</div>

