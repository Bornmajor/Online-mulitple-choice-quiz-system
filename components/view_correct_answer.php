<?php
$stud_u_id = getU_id($_SESSION['usr_id']);
$query = "SELECT * FROM results WHERE u_id = $stud_u_id AND exam_id = $exam";
$select_user_result = mysqli_query($connection,$query);
checkQuery($select_user_result);

if(mysqli_num_rows($select_user_result) > 0){
//show if student submit exam
//show correct answer
$query = "SELECT * FROM answers WHERE quiz_id = $quiz_id AND ans_status = 'correct'";
$select_correct = mysqli_query($connection,$query);
checkQuery($select_correct);
while($row = mysqli_fetch_assoc($select_correct)){
 $correct_ans_id = $row['ans_id'];
 $correct_answer = $row['answer'];
 echo  " Correct answer is : <span style='color:green;font-weight:600;'>".$correct_answer ."</span> <br>";

}

// verify correct answer
if($correct_ans_id == $user_ans_id){
successMsg('Your response is correct');

}else{
failMsg("Your response is incorrect");
}

}
?>