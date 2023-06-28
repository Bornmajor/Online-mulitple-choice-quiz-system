<title>Student portal</title>
<meta name="description" content="STUDENT">
</head>
<body>
<style>
.container{
    margin-bottom:200px; 
}
</style>

<?php include('includes/navbar.php'); ?>
<div class="container"><!--container-->

<div class="card examiner_card" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="images/set_exam.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Get started</h5>
        <a class="btn btn-success" href='?component=view_exams'> <i class="fas fa-plus"></i> Sit for an exam</a>
      </div>
    </div>
  </div>
</div>



<div class="card examiner_card" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="images/poll.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Results</h5>
        <a class="btn btn-success" href='?component=users_results'> <i class="fas fa-poll"></i> View results</a>
      </div>
    </div>
  </div>
</div>


<div class="card examiner_card" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="images/profile.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Profile</h5>
        <a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#profile"> <i class="fas fa-poll"></i> Edit profile</a>
      </div>
    </div>
  </div>
</div>


</div><!--container-->
