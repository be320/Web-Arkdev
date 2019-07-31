<?php
require_once(__DIR__.'/../Repository/CourseRepository.php');
require_once(__DIR__.'/../Models/Course.php');

$data = $_POST;
$hasErrors = false;
if( !isset($data['name']) || empty($data['name']) ){
    $hasErrors = true;
}
//todo: check if exists a course with same name or not
if( !isset($data['description']) || empty($data['description']) ){
    $hasErrors = true;
}

if( !isset($data['track_id']) || empty($data['track_id']) ){
    $hasErrors = true;
}

$success = false;
if($hasErrors === false){
    $course = new Course();
    $course->setId($data['id']);
    $course->setDescription($data['description']);
    $course->setName($data['name']);
    $course->setTrackId($data['track_id']);

    $courseRepo = new CourseRepository();
    $success = $courseRepo->update($course);

}
if($success){
    header('Location: /views/courseDashboard.php');
    exit();
}