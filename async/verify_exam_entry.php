<?php
include('../includes/functions.php');

$key = $_POST['enrollment_key'];
$exam_id = $_POST['exam_id'];

$key = escapeString($key);
$exam_id = escapeString($exam_id);

$query = "SELECT * FROM exams WHERE exam_id = $exam_id";
$select_exam = mysqli_query($connection,$query);
checkQuery($select_exam);
while($row = mysqli_fetch_assoc($select_exam)){
  $db_key =  $row['enrolment_key'];
}
if($db_key == $key){
    successMsg('Enrolled successfully!!');
    successMsg('Redirecting...');

    echo "<script>
    window.setTimeout(function() {
    window.location = '?component=sessions&enroll_key=$db_key&exam=$exam_id';
    }, 1500);
    </script>";

}else{
    failMsg('Enrolled key is invalid!!Try again.');
}
?>