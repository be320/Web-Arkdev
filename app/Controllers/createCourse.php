<?php
require_once (__DIR__."/../Repository/CourseRepository.php");
require_once (__DIR__."/../includes/uploadFile.php");

$data = $_POST;
$hasErrors = false;

print_r($data);

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
$successUpdate = false;

if($hasErrors === false){
    $courseRepo = new CourseRepository();
    $success = $courseRepo->create($data);

    if($success){
       // $filePath=uploadFile();
        //todo: update is not finished yet
       // $successUpdate = $courseRepo->updateImagePath($filePath, $data);



    }
}
if($success){
    //uploadFile();
    header('Location: /views/home.html');
    exit();
}