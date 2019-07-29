<?php
require_once(__DIR__ . '/../Repository/AdminRepository.php');
require_once(__DIR__ . '/../includes/sessionStart.php');


if (!isset($_POST['email']) || empty($_POST['email'])) {
    header('location: /index_mm.html');
    exit();
}

if (!isset($_POST['password']) || empty($_POST['password'])) {
    header('Location: /index_mm.html');
    exit();
}

$data = $_POST;

$adminRepo = new AdminRepository();
$admin = $adminRepo->login($data['email'], $data['password']);

if ($admin) {
    $_SESSION['admin'] = $admin;
    header('Location: /views/adminDashboard_mm.php');
    exit();

} else {
    header('Location: /views/index_mm.html');
    exit();
}