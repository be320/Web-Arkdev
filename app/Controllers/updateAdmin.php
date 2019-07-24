<?php
require_once(__DIR__ . '/../Repository/AdminRepository.php');
require_once(__DIR__ . '/../Models/Admin.php');

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


//*** Insert request data into DB ***//
$success = false;

if ($hasErrors === false) {

    $Admin = new Admin();
    $Admin->setId($data['id']);
    $Admin->setEmail($data['email']);
    $Admin->setname($data['name']);
    $Admin->setPassword($data['password']);

    $AdminRepo = new AdminRepository();
    $success = $AdminRepo->update($Admin);
}


//*** Handle redirection after saving ***//
if ($success) {
    header('Location: /home.php');
    exit();
}