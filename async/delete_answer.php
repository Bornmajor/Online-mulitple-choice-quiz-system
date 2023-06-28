<?php
include('../includes/functions.php');

$ans_id = $_POST['ans_id'];

$ans_id = escapeString($ans_id);

$query = "DELETE FROM answers WHERE ans_id = $ans_id";
$delete_ans = mysqli_query($connection,$query);
checkQuery($delete_ans);

?>