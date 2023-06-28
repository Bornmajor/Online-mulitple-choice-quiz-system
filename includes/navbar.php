
<nav class="navbar sticky-top navbar-expand-lg" >

<div  class="container-fluid">
<a class="navbar-brand" href="?page=home">QUIZ</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
<ul  class="navbar-nav me-4  mb-2 mb-lg-0">

<!-- <li class="nav-item">
  <a class="nav-link register" href="?component=home">Homepage</a>
</li> -->

<?php
if(isset($_SESSION['usr_id'])){
  $role = getUserRole($_SESSION['usr_id']);

  if($role == 'examiner'){
   echo '<li class="nav-item">
   <a class="nav-link register" href="?component=examiner_portal">Examiner portal</a>
   </li>';

  }
}
?>



<?php
if(isset($_SESSION['usr_id'])){
?>
<li class="nav-item dropdown" >
<a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false" >
<?php echo strtok(getUsername($_SESSION['usr_id']), " ");
?>
</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#profile"> Profile</a></li>

        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="?component=logout"> Logout</a></li>
      
      </ul>
</li> 

<?php
}else{
?>
<li class="nav-item">
  <a class="nav-link register" href="?component=home">Login</a>
</li>
<?php
}

?>

<li class="nav-item">
  <a class="nav-link register" href="#">Docs</a>
</li>




      
</ul>


    </div>

  </div>
</nav>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div id="profileFeedback"></div>

      <?php
      if(isset($_SESSION['usr_id'])){
       $u_id =  getU_id($_SESSION['usr_id']);

        $query = "SELECT * FROM users WHERE u_id = $u_id";
        $select_user = mysqli_query($connection,$query);
        checkQuery($select_user);
        while($row = mysqli_fetch_assoc($select_user)){
        $username = $row['username'];

        }

      }
      ?>
      <form action="" method="post" class='update_profile_form'>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput"  name='username' value='<?php echo $username ?>' required>
        <label for="floatingInput">Username</label>
      </div>

      <button type="submit" class='btn btn-primary'>Update profile</button>

      </form>
        

      </div>
 
    </div>
  </div>
</div>


<script>
  $('.update_profile_form').submit(function(e){
    e.preventDefault();

    let postData = $(this).serialize();

    $.post('async/update_profile.php',postData,function(data){
      $('#profileFeedback').html(data);

    })


  })
</script>