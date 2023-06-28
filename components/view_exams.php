<title>Exam set</title>
<meta name="description" content="Exam set">
</head>
<body>
<?php include('includes/navbar.php'); ?>

<style>
  .exam_container{
    margin:10px  10px 120px 10px ;
  }  
  .search_container{

    margin:10px;
  }
</style>



<div class="search_container">

<input type="search" name="" class='form-control' id='search' style='max-width:400px' placeholder='Search for exam'>    

</div>



<div class="exam_container"><!--exam_container-->


</div><!--exam_container-->


<script>
  function displayAllStudentsExams(){

    $.ajax({
      url:'async/view_all_exams.php',
      type:'POST',
      success:function(data){
        if(!data.error){
          $('.exam_container').html(data);
        }

      }

  })

  }

  displayAllStudentsExams();

  

</script>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="enrolModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body enrol_form">
        

      </div>
   
    </div>
  </div>
</div>