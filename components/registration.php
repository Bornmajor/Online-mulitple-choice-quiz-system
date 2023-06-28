<title>Registration</title>
<meta name="description" content="Registration">
</head>
<body>
<?php include ('includes/navbar.php'); ?>

<!--body-->
<?php
if(isset($_GET['role'])){
 $role = $_GET['role'];
  if($role !== 'student' AND $role !== 'examiner'){
    header("Location: ?component=home");
  //  echo 'no';
  }
  
}
?>

<div class="container_form_login"><!--container_form_login-->



<form action="" method="post" id='reg_form'>

<div class='form_title'>You are login in as <span style='font-weight:600;'><?php echo $_GET['role']; ?></span></div>

<div id="feedback"></div>

<input type="hidden" name="usr_role" value='<?php echo $_GET['role'] ?>'>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name" name='username' required>
  <label for="floatingInput">Names</label>
</div>

<div class="form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name='usr_mail' required>
  <label for="floatingInput">Email address</label>
</div>

<div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name='pwd' required>
  <label for="floatingPassword">Password</label>
</div>

<button type="submit" class='btn-primary'>Create account</button>

<br>
<label for="">Already have an account <a href="?component=login&role=<?php echo $_GET['role'] ?>">Login as <?php echo $_GET['role'] ?></a></label>

</form>

</div><!--container_form_login-->


<script>
  $('#reg_form').submit(function(e){
    e.preventDefault();

    let postData = $(this).serialize();
    // const form_title  = $('.form_title');

    $.post('async/add_user.php',postData,function(data){
     $('#feedback').html(data);

     $(".container_form_login")[0].scrollIntoView();
    //  form_title.scrollIntoView();
    


    });


  })
</script>