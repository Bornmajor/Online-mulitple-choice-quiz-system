<title>
 Student's results
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

<div class='container'>

<?php
//loop over exams set by examiner
$examiner_u_id = getU_id($_SESSION['usr_id']);

$query = "SELECT * FROM exams WHERE u_id = $examiner_u_id";
$select_exams = mysqli_query($connection,$query);
checkQuery($select_exams);
while($row = mysqli_fetch_assoc($select_exams)){
   $exam_id = $row['exam_id'];
   $exam_title = $row['exam_title'];

?>
<div class="card exam_set_item" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $exam_title ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">
        <?php
        $query = "SELECT * FROM results WHERE exam_id = $exam_id";
        $select_response = mysqli_query($connection,$query);
        checkQuery($select_response);
       
        ?>
        <?php echo  mysqli_num_rows($select_response)." responses"; ?>
    </h6>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    <a href='?component=score_results&exam_id=<?php echo $exam_id ?>' class="btn btn-success">Views student's score</a>
    <!-- <a href="#" class="card-link">Another link</a> -->
  </div>
</div>

<?php
}
echo emptyTableRowMsg($select_exams,'No results');
?>






</div>



