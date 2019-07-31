<?php
require_once(__DIR__ . '/../Repository/AdminRepository.php');

$data = $_GET;

$AdminRepo = new AdminRepository();
$success = $AdminRepo->deleteById($data['id']);



//*** Handle redirection after saving ***//
if ($success) {
    header('Location: /views/adminDashboard.php');
    exit();
}else {
    echo("delete error check delete admin");
}