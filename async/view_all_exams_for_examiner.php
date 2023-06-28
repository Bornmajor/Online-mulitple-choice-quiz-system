
<?php
include('../includes/functions.php');


$usr_id = $_SESSION['usr_id'];

$u_id = getU_id($usr_id);

$query = "SELECT * FROM exams WHERE u_id = $u_id ";
$select_usr_exams = mysqli_query($connection,$query);
checkQuery($select_usr_exams);
while($row = mysqli_fetch_assoc($select_usr_exams)){
    $exam_id = $row['exam_id'];
    $exam_title = $row['exam_title'];
?>
<div class="card exam_set_item" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $exam_title ?> 
      <span class='icons edit_exam' exam-id='<?php echo $exam_id ?>' data-bs-toggle="modal" data-bs-target="#editExam"><i class="fas fa-pen"></i></span>
    <span class='icons del_exam' exam-id='<?php echo $exam_id ?>' ><i class="fas fa-trash"></i></span>
  
  
  </h5>
    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    <a href="?component=edit_exam&exam=<?php echo $exam_id  ?>" class="btn btn-success">View exam</a>
    <!-- <a href="#" class="card-link">Another link</a> -->
  </div>
</div>

<?php
}
echo emptyTableRowMsg($select_usr_exams,'No result');
?>

<script>
    $('.edit_exam').click(function(){
   let exam_id = $(this).attr('exam-id');

    $.post('async/edit_exam_form.php',{exam_id:exam_id},function(data){
      $('.load_edit_exam').html(data);

      
      
    })

  })

  $('.del_exam').click(function(){
    let exam_id = $(this).attr('exam-id');

    if (confirm('Are you sure you want to delete this?')) {
    $.post('async/delete_exam.php',{exam_id:exam_id},function(data){
      displayAllExams();
    })
    }
  })
</script>