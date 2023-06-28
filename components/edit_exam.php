<title>Exam set</title>
<meta name="description" content="Exam set">
</head>
<body>
<?php include('includes/navbar.php'); ?>
<style>
    .edit_exam{
        display:flex;
        /* width:100%; */
        align-items:center;
        justify-content:center;
        flex-direction:column;
        
    }
   
    .preview_container,.exam_session_details{
        background-color:#f1f1f1;
        border-radius:10px;
       flex-direction:column;
        display:flex;
        width:100%;
        margin:10px;



    }

      .edit_settings{
        display:flex;
        width:100%;
        margin:10px;
        position:sticky;
       
    }
    .quiz_form{
        display:flex;
        align-items:center;

    }
    .preview{
         padding:10px 10px 60px 10px;
    }
  
    .preview_title{
        /* color: #ebebeb; */
        padding:10px;
       color: #4a4747; 
       font-size:18px;
       font-weight:600;
    }
    .question{
        margin:40px 0; 
    }
 
    .checked_btn{
        border-radius:50%;
        font-size:14px;
    }
    .option{
        font-size:14px;
        margin:10px 0;
    }
    .option_input_text{
       border:none;
       height:30px;
       border-radius:5px;
    }

    .quiz_answers{
        margin:10px 0;
    }
    .choice{
        display: flex;
        align-items:center;
        font-size:14px;
        max-width:400px;
        margin:10px;
    }
    .status_icon{
        margin:0 8px;
    }
    .input_quiz_point{
        width:100px;
    }
   
    @media screen and (max-width:710px){     
        .edit_exam{
            flex-direction:column-reverse;
        }
    }
</style>

<div class="main_container" style='display:flex;align-items:center;justify-content:center;'>



<div class="edit_exam"><!--edit_exam-->


<div class="exam_session_details">
      <?php
    if(isset($_GET['exam'])){

    $exam = $_GET['exam'];
    $query = "SELECT * FROM exams WHERE exam_id = $exam";
    $select_exam = mysqli_query($connection,$query);
    checkQuery($select_exam);
    while($row = mysqli_fetch_assoc($select_exam)){
    $exam_title =  $row['exam_title'];
    $start_time = $row['start_time'];
    $finish_time = $row['finish_time'];
    $u_id = $row['u_id'];
    $enrolment_key = $row['enrolment_key'];


    }
      
    }
   
    ?>
<div>
    <div class='exam_title'><span style='font-weight:600;'>Exam</span> : <?php echo $exam_title; ?></div>
    <div class='exam_duration'><span style='font-weight:600;'>Start time</span> : <?php echo $start_time ?> </div>
    <div class='exam_duration'><span style='font-weight:600;'>Ending time</span> : <?php echo $finish_time ?> </div>
    <div class='exam_student'><span style='font-weight:600;'>Examiner:</span> <?php echo getUsernameFromU_id($u_id); ?></div>
    <div class="enrolment_key"><span style='font-weight:600;'>Enrollment Key:</span><?php echo $enrolment_key ?></div>
</div>

<div class="total_points">
    25 pts
</div>
  
  </div>  



<div class="preview_container"><!--preview_container-->
  <div class="preview_title">
 Preview
  </div> 

  <div class="preview"></div>

  <div class="edit_settings">
    <!--add quiz-->

<form action="" method="post" class='add_quiz_form' autocomplete='off'>

<label for="">Points per correct answer</label>
<input type="number" name="quiz_points" class='form-control input_quiz_point'  min='1' required>

<br>
<div class="quiz_form"><!--quiz_form-->
<input type="hidden" name="exam_id" value="<?php echo $_GET['exam']; ?>">

<div class="form-floating mb-3">
  <input type="text" class="form-control quiz_input_text" placeholder="name@example.com" name='quiz_title' required>
  <label for="floatingInput">Input question</label>
</div>

<button type="submit" class='btn-primary checked_btn'><i class="fas fa-check"></i></button>    
</div><!--quiz_form-->


<div class="mb-3 form-check" title='Include multiple choice'>
    <input type="checkbox" class="form-check-input" name='choices' value='multiple_choice'>
    <label class="form-check-label" for="exampleCheck1" >Multiple answers</label>
</div>

</form>
     <!--add quiz-->
  </div>

</div><!--preview_container-->




</div><!--edit_exam-->





</div>
<script>
    $('.add_quiz_form').submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        $.post('async/add_quiz.php',postData,function(data){
            loadExam();
            $(".add_quiz_form")[0].reset();
        })

    })

    function loadExam(){

    let exam_id = "<?php echo $_GET['exam']; ?>";

    $.ajax({
        url:'async/view_exam.php',
        type: 'POST',
        data: {exam_id:exam_id},
        success:function(data){
            if(!data.error){
                $('.preview').html(data);
        }

        }
    })


    }

    function loadTotalPoints(){
         let exam_id = "<?php echo $_GET['exam']; ?>";
         $.ajax({
            url:'async/display_points.php',
            type:'POST',
            data: {exam_id:exam_id},
            success:function(data){
                if(!data.error){
                    $('.total_points').html(data);
                }
            }
         })
    }

    setTimeout(() => {
        loadTotalPoints()
        loadExam(); 
    }, 1000);

</script>