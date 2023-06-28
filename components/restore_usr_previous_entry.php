<?php
//display previous user entry
$stud_u_id = getU_id($_SESSION['usr_id']);
$query = "SELECT * FROM users_answers WHERE ans_id = $ans_id AND u_id =  $stud_u_id";
$select_users_answer = mysqli_query($connection,$query);
checkQuery($select_users_answer);
while($row = mysqli_fetch_assoc($select_users_answer)){
    $user_ans_id = $row['ans_id'];

   if(isset($user_ans_id)){
    $query = "SELECT * FROM answers WHERE ans_id = $user_ans_id";
    $select_answer_title = mysqli_query($connection,$query);
    checkQuery($select_answer_title);
    while($row = mysqli_fetch_assoc($select_answer_title)){
      $select_ans_id = $row['ans_id']; 
    
 
    }
    ?>
     <script>
     $('.usr_option_input').each(function(){
        if($(this).attr('ans-id') == "<?php echo  $select_ans_id ?>" ){
           $(this).prop( "checked", true );

     }
     })
 
     </script>
    <?php
   //
} 

}
?>