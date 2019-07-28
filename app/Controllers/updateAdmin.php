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

echo('data validated');
//*** Insert request data into DB ***//
$success = false;

if ($hasErrors === false) {

    $Admin = new Admin();
    $Admin->setId($data['id']);
    $Admin->setEmail($data['email']);
    $Admin->setname($data['name']);
    $Admin->setPassword($data['password']);
    echo('<br>data put into admin object');
    $AdminRepo = new AdminRepository();
    $success = $AdminRepo->update($Admin);
}
//echo('<br>data put into database');


//*** Handle redirection after saving ***//
if ($success) {
    header('Location: /views/adminDashboard.php');
    echo('<br>relocated');
    exit();
}

