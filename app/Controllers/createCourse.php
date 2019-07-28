<?php
require_once (__DIR__."/../Repository/CourseRepository.php");
require_once (__DIR__."/../includes/uploadFile.php");

$data = $_POST;
$photo = $_FILES;
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

var_dump($hasErrors);

if($hasErrors === false){
    $courseRepo = new CourseRepository();
    $success = $courseRepo->create($data,$photo['image_path']);

    print_r($success);
    if($success){
            $filePath=uploadFile();
        //todo: update is not finished yet
       // $successUpdate = $courseRepo->updateImagePath($filePath, $data);



    }
}
if($success){
    echo '1';
    uploadFile();
    header('Location: /views/courseDashboard_mm.php');
    exit();
}