<?php
include('../includes/functions.php');

$exam_title = $_POST['exam_title'];
$exam_title = escapeString($exam_title);


?>
<form action="" method="post" class='add_date_form setup_form'>

<input type="hidden" name="exam_title" value='<?php  echo $exam_title ?>'>

<div class="mb-3">
 
  <label for="floatingPassword" class="form-label">Date examined </label>
   <input type="date" name="exam_date" class='form-control' required>
</div>   

<div class="mb-3">
  <label for="" class="form-label">Starting time</label>
  <input type="time" name="start_time" class='form-control'>
</div>   

<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Finishing time</label>
<input type="time" name="finish_time" class='form-control'> 
</div>
 




<button  type="submit" class='btn-primary w-100'>Create exam</button>

</form>

<script>
    $('.add_date_form').submit(function(e){
        e.preventDefault();
        let postData = $(this).serialize();


        $.post('async/add_date_time.php',postData,function(data){
            $('.setup_form').html(data);
        })
    })
</script>