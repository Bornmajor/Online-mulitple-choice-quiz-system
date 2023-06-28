<?php
include('../includes/functions.php');

$usr_id = generateUserId();

$usr_role = $_POST['usr_role'];
$username = $_POST['username'];
$usr_mail = $_POST['usr_mail'];
$pwd = $_POST['pwd'];

$usr_role = escapeString($usr_role);
$username = escapeString($username);
$usr_mail = escapeString($usr_mail);
$pwd = escapeString($pwd);

// $query = "SELECT * FROM users WHERE usr_mail = '$usr_mail'";
// $select_user = mysqli_query($connection,$query);
// checkQuery($select_user);
// while($row = mysqli_fetch_assoc($select_user)){
//    $db_usr_mail =  $row['usr_mail']
// }


if(checkUserEmailExist($usr_mail)){

// password encryption
$pwd = password_hash($pwd,PASSWORD_BCRYPT,array('cost' => 12));
$query = "INSERT INTO users(usr_id,username,usr_mail,usr_role,pwd)VALUES('$usr_id','$username','$usr_mail','$usr_role','$pwd')";
$insert_user = mysqli_query($connection,$query);

if($insert_user){
successMsg('Account created!!');
successMsg('Redirecting!!');

$_SESSION['usr_id'] =  $usr_id;
//reset form
$role = getUserRole($usr_id);
if($role == 'examiner'){
  echo "<script>
  window.setTimeout(function() {
  window.location = '?component=examiner_portal';
  }, 2000);
  </script>";

}else{
  echo "<script>
  window.setTimeout(function() {
  window.location = '?component=student_portal';
  }, 2000);
  </script>";

}

?>
<script>
$('#reg_form')[0].reset();
</script>
<?php

}
}else{
    failMsg('Email not available');
}


?>
