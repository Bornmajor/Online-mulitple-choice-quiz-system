<?php
include('../includes/functions.php');

$exam_id = $_POST['exam_id'];
$exam_id = escapeString($exam_id);

$query = "SELECT * FROM exams WHERE exam_id = $exam_id";
$select_exam = mysqli_query($connection,$query);
checkQuery($select_exam);
while($row = mysqli_fetch_assoc($select_exam)){
   $exam_title = $row['exam_title'];
   $exam_date = $row['exam_date'];
   $start_time = $row['start_time'];
   $finish_time =$row['finish_time'];
   $exam_desc = $row['exam_desc'];

}
?>

<form action="" method="post" class='edit_exam_form'>

<input type="hidden" name="exam_id" value='<?php echo $exam_id ?>'>

<div class="form-floating mb-3">
  <input type="text" class="form-control" placeholder="name@example.com" name='exam_title' value='<?php echo  $exam_title ?>' required>
  <label for="floatingInput">Exam title</label>
</div>

<div class="mb-3">
  <label for="floatingPassword" class="form-label">Date examined </label>
   <input type="date" name="exam_date" class='form-control'  value='<?php echo $exam_date ?>'required>
</div>   

<div class="mb-3">
  <label for="" class="form-label">Starting time</label>
  <input type="time" name="start_time" class='form-control' value='<?php echo $start_time ?>'>
</div>   

<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Finishing time</label>
<input type="time" name="finish_time" class='form-control' value='<?php echo $finish_time ?>'> 
</div>

<div class="form-floating">
  <textarea class="form-control" placeholder="" id="floatingTextarea2" style="height: 150px;resize:none;" name='exam_desc'><?php echo $exam_desc  ?></textarea>
  <label for="floatingTextarea2">Additional Information</label>
</div>

<button type="submit" class='btn-primary'>Update</button>

</form>

<script>
    $('.edit_exam_form').submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        $.post('async/update_exam.php',postData,function(data){
            displayAllExams();
        })

    })
</script>