<?php
require_once (__DIR__."/../Repository/TeachRepository.php");
$teachRepo = new TeachRepository();

$data=$_POST;
$hasErrors = false;
var_dump($data);
if( !isset($data['course_id']) || empty($data['course_id']) ){
    $hasErrors = true;
    $error = 'chooseCourseName';
    header('Location: /views/teach.php?error='.$error.'');
    exit();
}
if( !isset($data['instructor_id']) || empty($data['instructor_id']) ){
    $hasErrors = true;
    $error = 'chooseInstructorName';
    header('Location: /views/teach.php?error='.$error.'');
    exit();
}
//checking if this instructor is already assigned to this course
//if not assigned before -> will continue and assign them in case of no other errors
//if already assigned -> will enter this if and show error message
if($teachRepo->checkExist($data['course_id'],$data['instructor_id'])){
    $error = 'courseAlreadyAssignedToInstructor';
    header('Location: /views/teach.php?error='.$error.'');
    exit();
}
$success = false;

if( $hasErrors === false ){
    $success = $teachRepo->create($data);
}
if($success){
    $state = 'InstructorAssignedToCourse';
    header('Location: /views/teach.php?state='.$state.'');
    exit();
}