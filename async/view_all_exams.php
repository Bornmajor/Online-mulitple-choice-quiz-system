<?php
include('../includes/functions.php');



$query = "SELECT * FROM exams";
$select_usr_exams = mysqli_query($connection,$query);
checkQuery($select_usr_exams);
while($row = mysqli_fetch_assoc($select_usr_exams)){
    $exam_id = $row['exam_id'];
    $exam_title = $row['exam_title'];
?>
<div class="card exam_set_item" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $exam_title ?> 
  
  
  </h5>
    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    <a exam-id='<?php echo $exam_id ?>' class="btn btn-success enroll_btn" data-bs-toggle="modal" data-bs-target="#enrolModal">Start now</a>
    <!-- <a href="#" class="card-link">Another link</a> -->
  </div>
</div>

<?php
}
echo emptyTableRowMsg($select_usr_exams,'No result');
?>

<script>
  $('.enroll_btn').click(function(){

    let exam_id = $(this).attr('exam-id');

    $.post('async/enrol_form.php',{exam_id:exam_id},function(data){
      $('.enrol_form').html(data);

    })
  })
</script>
