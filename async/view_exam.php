<?php  
include('../includes/functions.php');

$exam_id = $_POST['exam_id'];

$query = "SELECT * FROM questions WHERE exam_id = $exam_id";
$select_exam = mysqli_query($connection,$query);
checkQuery($select_exam);
$i=1;
while($row = mysqli_fetch_assoc($select_exam)){
 $quiz_id = $row['quiz_id'];
 $quiz_title = $row['quiz_title'];


?>
<div class='question'><!--question-->
 <span><?php echo $i++; ?>.</span> <span><?php echo $quiz_title; ?></span>
 <span quiz-id='<?php echo $quiz_id ?>' class='icons edit_quiz' > <i class="fas fa-pen"></i></span>
 <span quiz-id='<?php echo $quiz_id ?>' class='icons del_quiz' ><i class="fas fa-trash"></i></span>


<div class="multichoices"><!--multichoices-->


<form action="" method="post" class="option option_ans_form" autocomplete='off'>

<input type="hidden" name="exam_id" value='<?php echo $exam_id ?>'>
<input type="hidden" name="quiz_id" value='<?php echo $quiz_id ?>'>

<input type="text" class="option_input_text" placeholder='Add option' name='answer' required>
<button type="submit" class='btn-primary checked_btn'><i class="fas fa-check"></i></button>  

<div class="mb-2 form-check" title='This answer is correct'>
    <input type="checkbox" class="form-check-input" name='ans_status' value='correct'>
    <label class="form-check-label" for="exampleCheck1" >Correct answer</label>
</div>
  
</form>
 



<div class="quiz_answers"><!--quiz_answers-->

<?php
$query = "SELECT * FROM answers WHERE quiz_id = $quiz_id";
$select_answer = mysqli_query($connection,$query);
checkQuery($select_answer);
while($row = mysqli_fetch_assoc($select_answer)){
    $ans_id = $row['ans_id'];
   $answer = $row['answer'];
   $ans_status = $row['ans_status'];

?>
<div class="choice"><!--choice-->
    <span class='status_icon'>
    <?php
    if($ans_status == 'correct'){
        echo '<i class="fas fa-check"></i>';
    }else{
        echo '<i class="fas fa-times"></i>';
    }
    ?>
    </span> 

    <span class='answer_item'>
    <span><?php echo $answer ?></span> 
    <span class='icons del_ans' ans-id='<?php echo $ans_id; ?>'><i class="fas fa-trash"></i></span>
    </span>
</div><!--choice-->

<?php
}
?>



</div><!--quiz_answers-->





</div><!--multichoices-->


</div><!--question-->
<?php
}
?>

<script>
    $('.del_quiz').click(function(){
      let quiz_id =  $(this).attr('quiz-id');

    //   alert(quiz_id);
    if (confirm('Are you sure you want to delete this?')) {

     $.post('async/delete_quiz.php',{quiz_id:quiz_id},function(){
        loadExam();
     })

    }
    })

    $('.option_ans_form').submit(function(e){
        e.preventDefault();
        let postData = $(this).serialize();

        $.post('async/add_answer.php',postData,function(){
            loadExam();
            loadTotalPoints();
        })

    })

    $('.del_ans').click(function(){
      let ans_id =  $(this).attr('ans-id');

    //   alert(quiz_id);


     $.post('async/delete_answer.php',{ans_id:ans_id},function(){
        loadExam();
        loadTotalPoints();
     })

    })




</script>