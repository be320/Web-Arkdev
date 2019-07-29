<?php

require_once (__DIR__."/../includes/uploadFile.php");
require_once(__DIR__ . '/../Repository/InstructorRepository.php');

session_start();
$photo =$_FILES;
$data = $_POST;
if($photo==null){
    echo ('null');
}


//*** validate inputs ***//
$hasErrors = false;

// Validate email
if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
    $hasErrors = true;
}

if (!isset($data['name']) || empty($data['name'])) {
    $hasErrors = true;
}

if (!isset($data['bio']) || empty($data['bio'])) {
    $hasErrors = true;
}

//*** Insert request data into DB ***//
$success = false;

if ($hasErrors === false) {

    $userRepo = new InstructorRepository();
    $success = $userRepo->createInstructor($data,$photo['image_path']);

    if ($success) {
        $filePath = uploadFile();
        // todo: do not miss to update the created user with the upload file path
    }


}

