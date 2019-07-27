<?php
require_once(__DIR__ . '/../Repository/AdminRepository.php');

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

//validate name
if (!isset($data['name']) || empty($data['name'])) {
    $hasErrors = true;
}

//validate password
if (!isset($data['password']) || empty($data['password'])) {
    $hasErrors = true;
}

if ($hasErrors === false) {
    $AdminRepo = new AdminRepository();
    $success = $AdminRepo->create($data);

    if ($success) {
        header('Location: /views/index.html');
        exit();
    }
}
