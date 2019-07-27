<?php
require_once(__DIR__ . '/../Repository/StudentRepository.php');

// 1- Catch inputs from request
// 2- Sanitize all inputs before use
// 3- Validate inputs
// 4- process inputs

$data = $_GET;

//*** validate inputs ***//
$hasErrors = false;

if (!isset($data['id']) || empty($data['id'])) {
    $hasErrors = true;
}


//*** Insert request data into DB ***//
$success = false;

if ($hasErrors === false) {
    $studentRepo = new StudentRepository();
    $success = $studentRepo->deleteById($data['id']);
}


//*** Handle redirection after saving ***//
if ($success) {
    header('Location: /views/studentDashboard_mm');
    exit();
}