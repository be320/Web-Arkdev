<?php
require_once(__DIR__ . '/../Repository/AdminRepository.php');

// 1- Catch inputs from request
// 2- Sanitize all inputs before use
// 3- Validate inputs
// 4- process inputs

$data = $_GET;

$AdminRepo = new AdminRepository();
$success = $AdminRepo->deleteById($data['id']);



//*** Handle redirection after saving ***//
if ($success) {
    header('Location: /home.php');
    exit();
}else {
    echo("delete error check delete admin");
}