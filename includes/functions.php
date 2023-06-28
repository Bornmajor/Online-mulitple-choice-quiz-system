<?php
include('connection.php');

function escapeString($string){
    global  $connection;
   return mysqli_real_escape_string($connection,$string);
 
 }
 
 //success msg
function successMsg($msg){
  echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

//fail msg
function failMsg($msg){
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

//warning msg
function warnMsg($msg){
  echo '
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

function checkQuery($result){
    global $connection;
    if($result){
  
    }else{
        die("Query failed".mysqli_error($connection));
    
    }  
  }

  function generateEnrolmentKey(){
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
   return substr(str_shuffle($str_result),
                        0, 6);

  }
  function generateUserString($length_of_string){
    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';   // Shuffle the $str_result and returns substring
    // of specified length
    $gen_video_id = "Q-U". substr(str_shuffle($str_result),
                        0, $length_of_string);
      
   return $gen_video_id;
  }
  

function generateUserId(){
    global $connection;
    $usr_id =  generateUserString(30);

    $query = "SELECT * FROM users WHERE usr_id = '$usr_id'";
    $select_usr = mysqli_query($connection,$query);
    checkQuery($select_usr);
    while($row = mysqli_fetch_assoc($select_usr)){
     $db_usr_id =  $row['usr_id'];
    }
    if(isset($db_usr_id)){
      return  $usr_id =  generateUserString(30); 
    }else{
      return   $usr_id =  generateUserString(30); 
    }
    
}

function checkUserEmailExist($usr_mail){
    global $connection;
    $usr_mail = escapeString($usr_mail);

    $query = "SELECT usr_mail FROM users WHERE usr_mail ='$usr_mail'";
    $select_mail = mysqli_query($connection,$query);
    checkQuery($select_mail);

    while($row = mysqli_fetch_assoc($select_mail)){
     $db_usr_mail =  $row['usr_mail'];
    }
    if(isset($db_usr_mail)){
        return false;
    }else{
        return true;
    }


}

function getUsername($usr_id){
    global $connection;
    $usr_id =  escapeString($usr_id);
    $query = "SELECT * FROM users WHERE usr_id = '$usr_id'";
    $select_usr = mysqli_query($connection,$query);
    checkQuery($select_usr);
    while($row = mysqli_fetch_assoc($select_usr)){
      $username =  $row['username'];

    }
    
    return $username;
}

function getUserRole($usr_id){
  global $connection;
  $usr_id =  escapeString($usr_id);
  $query = "SELECT * FROM users WHERE usr_id = '$usr_id'";
  $select_role = mysqli_query($connection,$query);
  checkQuery(  $select_role);
  while($row = mysqli_fetch_assoc($select_role )){
    $usr_role=  $row['usr_role'];

  }
  
  return $usr_role;


}


function sessionRequired(){
  if(!isset($_SESSION['usr_id'])){
    header('Location: ?component=home');
  }
}
function examinerRequired($usr_id){
  global $connection;
  $usr_id = escapeString($usr_id);
  $query = "SELECT * FROM users WHERE usr_id = '$usr_id'";
  $check_role = mysqli_query($connection,$query);
  checkQuery($check_role);
  while($row = mysqli_fetch_assoc($check_role)){
  $usr_role =  $row['usr_role'];

  }
  if($usr_role !== 'examiner'){
    header("Location: ?component=home");
  }


}

function getU_id($usr_id){
  global $connection;
  $query = "SELECT * FROM users WHERE usr_id = '$usr_id'";
  $select_uid = mysqli_query($connection,$query);
  checkQuery($select_uid);
  while($row = mysqli_fetch_assoc($select_uid)){
  $u_id =  $row['u_id'];

  }

  return $u_id;
}

function getUsernameFromU_id($u_id){
  global $connection;
  $u_id = escapeString($u_id);
  $query = "SELECT * FROM users WHERE u_id = $u_id";
  $select_username = mysqli_query($connection,$query);
  checkQuery($select_username);
  while($row = mysqli_fetch_assoc($select_username)){
   $username = $row['username'];

  }
  return $username;

}

function fetchEmptyImg(){
 return '<img src="images/empty-concept.png" width="200px" alt="No results">';


}

function emptyTableRowMsg($query,$msg){
  global $connection;
  $img = fetchEmptyImg();
  
  $total_rows = mysqli_num_rows($query);
  if($total_rows == 0){
  return '<div class="no_row_data">'
      .$img.$msg.
      '</div>';
  }


}
?>