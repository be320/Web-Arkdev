<?php
require_once(__DIR__ . '/../Repository/StudentRepository.php');
$query = $_POST;
$studentRepo = new StudentRepository();
$students = $studentRepo->getAll();


if($query['name']){
    $students=$studentRepo->getByName($query['name']);
}
//$success = $studentRepo->create($data,$photo['image_path']);
header('Location: /views/studentDashboard_mm');
exit();