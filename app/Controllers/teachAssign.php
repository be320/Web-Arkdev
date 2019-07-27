<?php
require_once (__DIR__."/../Repository/TeachRepository.php");

$data=$_POST;
$hasErrors = false;

if( !isset($data['course_id']) || empty($data['course_id']) ){
    $hasErrors = true;
}
if( !isset($data['instructor_id']) || empty($data['instructor_id']) ){
    $hasErrors = true;
}
$success = false;

if( $hasErrors === false ){
    $teachRepo = new TeachRepository();
    $success = $teachRepo->create($data);
}
if($success){
    header("Location: /views/teach.html");
    exit();
}