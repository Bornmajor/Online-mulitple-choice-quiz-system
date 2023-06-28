<title>Home</title>
<meta name="description" content="Login">
</head>
<body>
<?php include('includes/navbar.php'); ?>

<!--body-->

<div class="container_form_login"><!--container_form_login-->



<form action="" method="post" id='login_form'>

<div class='form_title'>You are login in as <span style='font-weight:600;'><?php echo $_GET['role']; ?></span></div>

<div id="feedback"></div>

<div class="form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name='usr_mail'>
  <label for="floatingInput">Email address</label>
</div>

<div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name='pwd'>
  <label for="floatingPassword">Password</label>
</div>

<button type="submit" class='btn-primary'>Login</button>

<br>
<label for="">Need an account? <a href="?component=registration&role=<?php echo $_GET['role'] ?>">Create a <?php echo $_GET['role']?> account</a></label>

</form>

</div><!--container_form_login-->

<script>
  $('#login_form').submit(function(e){
    e.preventDefault();
    let postData = $(this).serialize();

    $.post('async/login_user.php',postData,function(data){
     $('#feedback').html(data);

    })

  })
</script>