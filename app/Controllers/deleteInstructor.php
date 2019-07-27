<?php
require_once(__DIR__.'/../Repository/InstructorRepository.php.php');

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
    header("Location: /views/courseDashboard");
    exit();
}