<?php
require_once(__DIR__.'/../Repository/CourseRepository.php');
require_once(__DIR__.'/../Models/Course.php');

$courseRepo = new CourseRepository();
$data = $_POST;

$hasErrors = false;
if( !isset($data['name']) || empty($data['name']) ){
    $hasErrors = true;
}
//checks if there is a course with such name or not
$course = $courseRepo->getById($data['id']);
var_dump($course);
if($data['name'] != $course->getName()) {
    if ($courseRepo->checkCourseNameExists($data['name'])) {
        $error = 'errorNameExists';
        header('Location: /views/courseEdit.php?error=' . $error . '&name=' . $data['name'] . '&description=' . $data['description'] . '&track_id=' . $data['track_id'] . '&id=' . $data['id'] . '');
        exit();
    }
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
var_dump($success);

if($success){
    $state = 'courseEdited';
    header('Location: /views/courseDashboard.php?state='.$state.'');
    exit();
}