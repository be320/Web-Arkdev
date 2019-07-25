<?php

require_once(__DIR__ . '/../Repository/UserRepository.php');

$data = $_GET;

$hasErrors = false;


if (!isset($data['name']) || empty($data['name'])) {
    $hasErrors = true;
}
$success = false;

if ($hasErrors === false) {
    $trackRepo = new TrackRepository();
    $success = $trackRepo->deleteById($_data['id']);
}

if ($success) {
    header('Location: /home.php');
    exit();
}