<title>Create exam</title>
<meta name="description" content="Home">
</head>
<body>
<?php include('includes/navbar.php'); ?>

<?php 
sessionRequired();
examinerRequired($_SESSION['usr_id']);
?>

<div class="container_home"><!--container_home-->



<div class="welcome"><!--welcome-->

<div class="illustration"><!--illustration--->
    <img src="images/setup.png" alt="">
</div><!--illustration--->




<form action="" method="post" class='add_title_form setup_form'>

<div class="alert alert-dark form_title" role="alert">
  Setup exam
</div>


<div class="form-floating">
  <input type="text" class="form-control" id="floatingPassword" placeholder="Exam title" name='exam_title' required>
  <label for="floatingPassword">Add exam title</label>
</div>   

<button  type="submit" class='btn-primary w-100'>Add title</button>
</form>

</div><!--welcome-->




</div><!--container_home-->
<script>
 $('.add_title_form').submit(function(e){
    e.preventDefault();
    let postData = $(this).serialize();

    $.post('async/add_title_exam.php',postData,function(data){
        $('.setup_form').html(data);

    })

 })   
</script>