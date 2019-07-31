<?php
require_once (__DIR__."/../Repository/TeachRepository.php");
$teachRepo = new TeachRepository();

$data=$_POST;
$hasErrors = false;

if( !isset($data['course_id']) || empty($data['course_id']) ){
    $hasErrors = true;
    $error = 'chooseCourseId';
    header('Location: /views/teach.php?error='.$error.'');
    exit();
}
if( !isset($data['instructor_id']) || empty($data['instructor_id']) ){
    $hasErrors = true;
    $error = 'chooseInstructorId';
    header('Location: /views/teach.php?error='.$error.'');
    exit();
}
//checking if this instructor is already assigned to this course
//if already assigned -> will continue and unassign in case of no other errors
//if not assigned -> will enter this if condition and show error message
if(!$teachRepo->checkExist($data['course_id'],$data['instructor_id'])){
    $error = 'courseNotAlreadyAssignedToInstructor';
    header('Location: /views/teach.php?error='.$error.'');
    exit();
}
$success = false;


if( $hasErrors === false ){
    $teachRepo = new TeachRepository();
    $success = $teachRepo->unassign($data);
}
if($success){
    $state = 'InstructorUnAssignedFromCourse';
    header('Location: /views/teach.php?state='.$state.'');
    exit();
}

