<title>Exam set</title>
<meta name="description" content="Exam set">
</head>
<body>
<?php include('includes/navbar.php'); ?>
<style>
  .exam_container{
    margin: 60px 10px ;
  }  
</style>



<div class="exam_container"><!--exam_container-->


</div><!--exam_container-->


<div class=""><!--container-->

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

</div><!--container-->

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="editExam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body load_edit_exam">
         
      loading...

      </div>
  
    </div>
  </div>
</div>


<script>
  function displayAllExams(){

    $.ajax({
      url:'async/view_all_exams_for_examiner.php',
      type:'POST',
      success:function(data){
        if(!data.error){
          $('.exam_container').html(data);
        }

      }

  })

  }

  displayAllExams();

  

</script>