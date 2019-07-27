<?php
require_once (__DIR__."/../Repository/TeachRepository.php");
require_once (__DIR__."/../Repository/CourseRepository.php");
require_once (__DIR__."/../Repository/InstructorRepository.php");

$data=$_POST;
$hasErrors = false;

if( !isset($data['course_id']) || empty($data['course_id']) ){
    $hasErrors = true;
}
if( !isset($data['instructor_id']) || empty($data['instructor_id']) ){
    $hasErrors = true;
}
$success = false;
$courseExist = false;
$instructorExist = false;
/*
if( $hasErrors === false ){
    $courseRepo = new CourseRepository();
    $instructorRepo = new InstructorRepository();
    $teachRepo = new TeachRepository();

    if(!$courseRepo->checkExist($data['course_id'])){
        echo '<script type="text/javascript">
            alert("There is no Course with such ID");
        </script>';
        $success = false;
       // exit();
    }
    else if(!$instructorRepo->checkExist($data['instructor_id'])){
        echo '<script type="text/javascript">
            alert("There is no Instructor with such ID");
        </script>';
        $success = false;
        //exit();
    }
    else if(!$teachRepo->checkAssignExist($data)){
        echo '<script type="text/javascript">
            alert("This Course has no such Instructor");
        </script>';
        $success = false;
        //exit();
    }

    if($success) {
        $done = $teachRepo->unassign($data);
    }
    else{
        header("Location: /views/teach.html");
    }
}
if($done){
    header("Location: /views/teach.html");
    exit();
}*/

if( $hasErrors === false ){
    $teachRepo = new TeachRepository();
    $success = $teachRepo->unassign($data);
}
if($success){
    header("Location: /views/teach.html");
    exit();
}

