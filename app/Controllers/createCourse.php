<?php
require_once (__DIR__."/../Repository/CourseRepository.php");
require_once (__DIR__."/../includes/uploadFile.php");
$courseRepo = new CourseRepository();

$data = $_POST;
$photo = $_FILES;
$hasErrors = false;

if( !isset($data['name']) || empty($data['name']) ){
    $hasErrors = true;
}
//checks if there is a course with such name or not
if($courseRepo->checkCourseNameExists($data['name'])){
    $error = 'errorNameExists';
    header('Location: /views/createCourse_basma.php?error='.$error.'');
    exit();
}
if( !isset($data['description']) || empty($data['description']) ){
    $hasErrors = true;
}
if( !isset($data['track_id']) || empty($data['track_id']) ){
    $hasErrors = true;
}
//checks if there is a track with such ID or not
if($courseRepo->checkTrackIdExists($data['track_id'])){
    $error = 'errorTrackNotExist';
    header('Location: /views/createCourse_basma.php?error='.$error.'');
    exit();
}

$success = false;
if($hasErrors === false){
    $success = $courseRepo->create($data,$photo['image_path']);
    if($success){
            $filePath=uploadFile();
        //todo: update is not finished yet
       // $successUpdate = $courseRepo->updateImagePath($filePath, $data);



    }
}
if($success){
    echo '1';
    uploadFile();
    $state = 'courseAdded';
    header('Location: /views/courseDashboard_mm.php?state='.$state.'');
    exit();
}