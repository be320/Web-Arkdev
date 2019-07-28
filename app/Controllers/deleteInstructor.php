<?php
require_once(__DIR__.'/../Repository/InstructorRepository.php');

$data = $_GET;
$hasErrors = false;

if( !isset($data['id']) || empty($data['id']) ){
    $hasErrors = true;
}
$success = false;
if($hasErrors === false){
    $InstructorRepo = new InstructorRepository();
    $success = $InstructorRepo->deleteById($data['id']);
}
if($success){
    header("Location: /ArkDevProject2/views/instructorDashboard_mm.php");
    exit();
}