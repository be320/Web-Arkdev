<?php
require_once(__DIR__ . '/../Repository/StudentRepository.php');
require_once(__DIR__ . '/../Models/Student.php');

// 1- Catch inputs from request
// 2- Sanitize all inputs before use
// 3- Validate inputs
// 4- process inputs

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

if (!isset($data['gpa']) || empty($data['gpa'])) {
    $hasErrors = true;
}

if (!isset($data['level']) || empty($data['level'])) {
    $hasErrors = true;
}

if (!isset($data['gender']) || empty($data['gender'])) {
    $hasErrors = true;
}

if (!isset($data['image_path']) || empty($data['image_path'])) {
    $hasErrors = true;
}


//*** Insert request data into DB ***//
$success = false;

if ($hasErrors === false) {

    $student = new Student();
    $student->setId($data['id']);
    $student->setEmail($data['email']);
    $student->setName($data['name']);
    $student->setPassword($data['password']);
    $student->setLevel($data['level']);
    $student->setGpa($data['gpa']);
    $student->setImagePath($data['image_path']);
    $student->setGender($data['gender']);
    $studentRepo = new StudentRepository();
    $success = $studentRepo->update($student);
}


//*** Handle redirection after saving ***//
if ($success) {
    header('Location: /home.php');
    exit();
}