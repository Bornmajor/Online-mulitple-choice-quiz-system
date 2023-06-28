<title>
<?php
sessionRequired();

if(isset($_GET['exam'])){
$exam = $_GET['exam'];
$exam = escapeString($exam);

$query = "SELECT * FROM exams WHERE exam_id = $exam";
$select_exam = mysqli_query($connection,$query);
checkQuery($select_exam);
while($row = mysqli_fetch_assoc($select_exam)){
  $exam_title =  $row['exam_title'];
  $start_time = $row['start_time'];
  $finish_time = $row['finish_time'];
  $u_id = $row['u_id'];
  $db_key = $row['enrolment_key'];
  $exam_desc =$row['exam_desc'];
}

}else{
    header('Location:?component=home');
}

?>
<?php echo $exam_title?>
</title>
<meta name="description" content="Login">
</head>
<body>
<?php include('includes/navbar.php'); ?>

<?php
if(isset($_GET['enroll_key'])){
  $key =  $_GET['enroll_key'];

  if($key !== $db_key){
    header('Location : ?component=view_exams');

  }
}
?>
<!--body-->

<div class="exam_container"><!--exam_container-->

<div class="exam_session_details"><!--exam_session_details-->
    <div class='exam_title'><span style='font-weight:600;'>Exam</span> : <?php echo $exam_title; ?></div>
    <div class='exam_duration'><span style='font-weight:600;'>Start time</span> : <?php echo $start_time ?> </div>
    <div class='exam_duration'><span style='font-weight:600;'>Ending time</span> : <?php echo $finish_time ?> </div>
    <div class='exam_student'><span style='font-weight:600;'>Examiner:</span> <?php echo getUsernameFromU_id($u_id); ?></div>
    <br><br>
    <div class='exam_student' style='margin:10px 0;'><span style='font-weight:600;'>Student:</span> <?php echo getUsername($_SESSION['usr_id']); ?></div>
    
    <div class='additional_info'>
        <h6 style='text-decoration:underline;font-weight:600;'>Additional Information</h6>
        <span><?php echo $exam_desc ?></span>
    </div>

</div><!--exam_session_details-->


<?php
$query = "SELECT * FROM questions WHERE exam_id = $exam";
$select_exam = mysqli_query($connection,$query);
checkQuery($select_exam);
$i=1;
while($row = mysqli_fetch_assoc($select_exam)){
 $quiz_id = $row['quiz_id'];
 $quiz_title = $row['quiz_title'];
 $quiz_points = $row['quiz_points'];
 $choices = $row['choices'];
?>
<div class='quiz'><!--quiz-->

<div class="question">
<span><?php echo $i++; ?>.</span> <span><?php echo $quiz_title; ?> (<?php echo $quiz_points ?> pt per correct answer). </span>
</div>


<div class="multichoices"><!--multichoices-->
<form action="post" class='answer_form'>
<?php
$query = "SELECT * FROM answers WHERE quiz_id = $quiz_id";
$select_options = mysqli_query($connection,$query);
checkQuery($select_options);
while($row = mysqli_fetch_assoc($select_options)){
 
 $ans_id = $row['ans_id'];
 $answer = $row['answer'];

?>


<?php


if($choices == 'single_choice'){  

?>
<div class="form-check">
<input class="form-check-input usr_option_input" type="radio" name="option" ans-id='<?php echo $ans_id?>' quiz-id='<?php echo $quiz_id ?>' required>
<label class="form-check-label" for="flexRadioDefault1"> <?php echo $answer ?></label>
</div>   

<?php
//display previous user entry
include('components/restore_usr_previous_entry.php');
?>


<?php
}else{
//multiple choice

?>
<div class="form-check">
  <input class="form-check-input usr_option_input multiple_choice" type="checkbox" name='option' ans-id='<?php echo $ans_id?>' quiz-id='<?php echo $quiz_id ?>' required>
  <label class="form-check-label" for="flexCheckDefault"><?php echo $answer ?> </label>
</div>

<?php
//display previous user entry
include('components/restore_usr_previous_entry.php');

?>


<?php
}

}

?>
<?php
//show corrrect answer
include('components/view_correct_answer.php');

?>
</form>



</div><!--multichoices-->

</div><!--quiz-->



<?php
}
?>

<div class="submit_feedback"><!--submit_feedback-->

<?php
include('components/view_final_score.php');
?>

<div class="submit_exam_feedback"></div>

<button class="btn btn-success submit_exam">Submit exam</button>    

</div><!--submit_feedback-->




</div><!--exam_container-->

<div>
  <?php
  //check if already attempt 
  $student_u_id = getU_id($_SESSION['usr_id']);
  $query = "SELECT * FROM results WHERE u_id = $student_u_id AND exam_id = $exam";
  $select_result = mysqli_query($connection,$query);
  checkQuery($select_result);
  while($row = mysqli_fetch_assoc($select_result)){
  $db_result_id =  $row['result_id'];

  }
  if(isset($db_result_id)){
    //if result already exist disable all answers props
    
    echo '<script>
        $(".usr_option_input").prop("disabled",true);
        $(".submit_exam").html("Already attempted!!").prop("disabled",true);

    </script>';
  
  }
  
  ?>
</div>

<script>
  // $(".usr_option_input").prop("disabled",true);

    $('.submit_exam').click(function(){


        let exam_id = "<?php echo $_GET['exam'] ?>";
        $.post('async/submit_exam.php',{exam_id:exam_id},function(data){
              $('.submit_exam_feedback').html(data);
        })
    })

    $('.usr_option_input').click(function(){
       if($(this).is(':checked')){
        
        let ans_id = $(this).attr('ans-id');
        let exam_id = "<?php echo $_GET['exam'] ?>";
        let quiz_id = $(this).attr('quiz-id');
   

        $.post('async/user_answer_entry.php',{ans_id:ans_id,exam_id:exam_id,quiz_id:quiz_id},function(data){

        })


       }
  
    })
    $('.multiple_choice').click(function(){

    if(!$(this).is(':checked')){
            
            let ans_id = $(this).attr('ans-id');
            let exam_id = "<?php echo $_GET['exam'] ?>";
            let quiz_id = $(this).attr('quiz-id');
        

            $.post('async/user_answer_exit.php',{ans_id:ans_id,exam_id:exam_id,quiz_id:quiz_id},function(data){

            })


        }

    })
    


</script>
