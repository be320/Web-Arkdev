<?php
require_once(__DIR__ . '/../Repository/StudentRepository.php');
require_once(__DIR__ . '/../includes/uploadFile.php');

// 1- Catch inputs from request
// 2- Sanitize all inputs before use
// 3- Validate inputs
// 4- process inputs

$data = $_POST;
$photo =$_FILES;
//print_r($data);
//print_r($photo);
//*** validate inputs ***//
$hasErrors = false;

// Validate email
if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
    $hasErrors = true;
}

if (!isset($data['name']) || empty($data['name'])) {
    $hasErrors = true;
}

if (!isset($data['gpa']) || empty($data['gpa'])) {
    $hasErrors = true;
}

if (!isset($data['level']) || empty($data['level'])) {
    $hasErrors = true;
}

if (!isset($data['gender']) || empty($data['gender'])) {
    $hasErrors = true;
}

//if (!isset($data['image_path']) || empty($data['image_path'])) {
//    $hasErrors = true;
//}

if (!isset($data['password']) || empty($data['password'])) {
    $hasErrors = true;
}


//*** Insert request data into DB ***//
$success = false;

if ($hasErrors === false) {
   // uploadFile();
    $studentRepo = new StudentRepository();
    $success = $studentRepo->create($data,$photo['image_path']);

    // Start upload user image if user created successfully
    if ($success) {
            $filePath = uploadFile();
            print ($filePath);
        // todo: do not miss to update the created user with the upload file path
    }
}


//*** Handle redirection after saving ***//
if ($success) {
    uploadFile();
    header('Location: /views/index.html');
    exit();
}