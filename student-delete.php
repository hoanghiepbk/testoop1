<?php
require 'student_db.php';
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
if($id) {
	$delete=new DB_student;
	$sql = "DELETE FROM tb_sinhvien WHERE sv_id=$id";
	$delete->query($sql);
}
header("location: student-list.php");
?>