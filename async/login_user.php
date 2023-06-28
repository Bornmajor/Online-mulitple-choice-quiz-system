<?php
include('../includes/functions.php');

$usr_mail = $_POST['usr_mail'];
$pwd  = $_POST['pwd'];

$usr_mail = escapeString($usr_mail);
$pwd = escapeString($pwd);

$query = "SELECT * FROM users WHERE usr_mail = '$usr_mail'";
$select_usr = mysqli_query($connection,$query);
checkQuery($select_usr);
while($row = mysqli_fetch_assoc($select_usr)){
 $db_usr_id = $row['usr_id'];
  $db_usr_mail =  $row['usr_mail'];
  $db_pwd = $row['pwd'];

}
if(isset($db_usr_mail)){

   if(password_verify($pwd,$db_pwd)){
    
    successMsg('Login successfully!!');
    successMsg('Redirecting!!');
    
   $_SESSION['usr_id'] =  $db_usr_id;

  $role = getUserRole($db_usr_id);
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




   }else{
    failMsg('Password is not correct!!');
   }
}else{
    failMsg('Either email/password is not correct!!');
}
?>