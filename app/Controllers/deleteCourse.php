<?php
require_once(__DIR__.'/../Repository/CourseRepository.php');

$data = $_GET;
$hasErrors = false;

if( !isset($data['id']) || empty($data['id']) ){
    $hasErrors = true;
}
$success = false;
if($hasErrors === false){
    $courseRepo = new CourseRepository();
    $success = $courseRepo->deleteById($data['id']);
}
if($success){
    header("Location: /views/courseDashboard");
    exit();
}