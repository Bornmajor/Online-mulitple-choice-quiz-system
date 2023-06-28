<?php
include('../includes/functions.php');

if(isset($_SESSION['usr_id'])){

$usr_id = $_SESSION['usr_id'];
$username = $_POST['username'];

$usr_id = escapeString($usr_id);
$username = escapeString($username);


$query = "UPDATE users SET username = '$username' WHERE usr_id = '$usr_id'"; 
$update_profile = mysqli_query($connection,$query);   
if($update_profile){
    successMsg("Profile Update");
}
}

?>