<?php
require_once(__DIR__ . '/../Repository/StudentRepository.php');
require_once(__DIR__ . '/../Models/Student.php');

// 1- Catch inputs from request
// 2- Sanitize all inputs before use
// 3- Validate inputs
// 4- process inputs

$data = $_POST;
print_r($data);
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




//*** Insert request data into DB ***//
$success = false;

if ($hasErrors === false) {

    $studentRepo = new StudentRepository();
    $success = $studentRepo->update($data);
}


//*** Handle redirection after saving ***//
if ($success) {
   // header('Location: /views/index.html');
   // exit();
}