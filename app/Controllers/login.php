<?php
require_once(__DIR__ . '/../Repository/AdminRepository.php');
require_once(__DIR__ . '/../includes/sessionStart.php');


if (!isset($_POST['email']) || empty($_POST['email'])) {
    header('location: /index.html');
    exit();
}

if (!isset($_POST['password']) || empty($_POST['password'])) {
    header('Location: /index.html');
    exit();
}

$data = $_POST;

$adminRepo = new AdminRepository();
$admin = $adminRepo->login($data['email'], $data['password']);

if ($admin) {
    $_SESSION['admin'] = $admin;
    header('Location: /views/adminDashboard.php');
    exit();

} else {
    header('Location: /index.html');
    exit();
}