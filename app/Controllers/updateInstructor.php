<?php


require_once (__DIR__."/../includes/uploadFile.php");
require_once(__DIR__ . '/../Repository/InstructorRepository.php');

session_start();



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



    $edit = new Instructor();
    $edit->setId($data['id']);
    $edit->setEmail($data['email']);
    $edit->setBio($data['bio']);
    $edit->setImagePath($data['image_path']);
    $edit->setName($data['name']);
    $userRepo = new InstructorRepository();
    $success = $userRepo->updateInstructor($edit);


}
