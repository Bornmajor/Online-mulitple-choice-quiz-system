<title>Home</title>
<meta name="description" content="Home">
</head>
<body>
<?php include('includes/navbar.php'); ?>

<div class="container_home"><!--container_home-->



<div class="welcome"><!--welcome-->

<div class="illustration"><!--illustration--->
    <img src="images/welcome.png" alt="">
</div><!--illustration--->

<div class="wel_links_cont"><!--wel_links_cont--->

<!-- <div class="wel_title"></div> -->

<div class="alert alert-dark form_title" role="alert">
What's your role?
</div>

<div class="welcome_links">


    <a class='role_link examiner' href='?component=login&role=examiner'>
        <span><img src="images/teacher.png" alt=""></span>
        <span>
            Examiner 
        </span>
       
</a>

<a class='role_link student' href='?component=login&role=student'>
    <span><img src="images/student.png" alt=""></span>
        <span>
            Student
        </span>
       
</a>

</div>

</div><!--wel_links_cont--->

</div><!--welcome-->



</div><!--container_home-->
