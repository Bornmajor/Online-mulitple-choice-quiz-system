<?php include('includes/header.php');?>
<?php
if(isset($_GET['component'])){
$component = $_GET['component'];   
}else{
$component = '';
}


switch($component){
case 'home';
include('components/home.php');
break;
case 'registration';
include('components/registration.php');
break;
case 'login';
include('components/login.php');
break;
case 'sessions';
include('components/exam_sessions.php');
break;
case 'examiner_portal';
include('components/examiner_portal.php');
break;
case 'student_portal';
include('components/student_portal.php');
break;
case 'create_exam';
include('components/create_exam.php');
break;
case 'exam_set';
include('components/exam_set.php');
break;
case 'edit_exam';
include('components/edit_exam.php');
break;
case 'view_exams';
include('components/view_exams.php');
break;
case 'users_results';
include('components/users_results.php');
break;
case 'examiner_results';
include('components/examiner_results.php');
break;
case 'score_results';
include('components/score_results.php');
break;
case 'logout';
include('components/signout.php');
break;
default:
include('components/home.php');

}

?>


</body>
<?php include('includes/footer.php');?>