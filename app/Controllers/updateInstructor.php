<?php
require_once (__DIR__."/../includes/uploadFile.php");
require_once(__DIR__ . '/../Repository/InstructorRepository.php');
session_start();

$photo =$_FILES;
$data = $_POST;


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


    $instuctor = new Instructor();
    $instuctor->setInstructorId($data['id']);
    $instuctor->setBio($data['bio']);
    $instuctor->setName($data['name']);
    $instuctor->setEmail($data['email']);
    if($photo['image_path']['name'] !=""){


        $instuctor->setImagePath($photo['image_path']);

    }
    $insRepo = new InstructorRepository();
    $success = $insRepo->updateInstructor($instuctor);


//*** Handle redirection after saving ***//
    if ($success) {
        $filePath = uploadFile();
        header('Location: ../../views/instructorDashboard.php');
        exit();
    }
}