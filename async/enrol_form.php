<?php
include('../includes/functions.php');
?>
<form action="" method="post" class='enrollment_form'>

<div class="mb-3">
    <div id="feedback"></div>
</div>


<div class="mb-3">
 <b><label for="">Enter enrollment key</label> </b>  
</div>

<input type="hidden" name="exam_id" value='<?php echo $_POST['exam_id']; ?>'>

<div class="mb-3">
<input type="text" name="enrollment_key" class='form-control' required>   
</div>

<button type="submit" class='btn btn-primary'>Enroll now</button>
</form>

<script>
    $('.enrollment_form').submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        $.post('async/verify_exam_entry.php',postData,function(data){
            $('#feedback').html(data);

        })

    })
</script>
