<title>Examiner</title>
<meta name="description" content="Examiner portal">
</head>
<body>
<?php include('includes/navbar.php'); ?>

<style>
.container{
    margin-bottom:20px; 
}
</style>

<div class="container"><!--container-->

<div class="card examiner_card" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="images/set_exam.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Get started</h5>
        <a class="btn btn-success" href='?component=create_exam'> <i class="fas fa-plus"></i> Create exam</a>
      </div>
    </div>
  </div>
</div>

<div class="card examiner_card" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="images/college-entrance.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Exam published</h5>
        <a class="btn btn-success" href='?component=exam_set'> <i class="fas fa-poll"></i> View list</a>
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
        <h5 class="card-title">Students' results</h5>
        <a class="btn btn-success" href='?component=examiner_results'> <i class="fas fa-poll"></i> View results</a>
      </div>
    </div>
  </div>
</div>





<div class="card examiner_card"  data-bs-toggle="modal" data-bs-target="#profile">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="images/profile.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title" >Profile</h5>
        <a class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#profile"> <i class="fas fa-poll"></i> Edit profile</a>
      </div>
    </div>
  </div>
</div>

<div class="card examiner_card" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="images/performance.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Analysis</h5>
        <a class="btn btn-success"> <i class="fas fa-poll"></i> View analysis</a>
      </div>
    </div>
  </div>
</div>









</div><!--container-->