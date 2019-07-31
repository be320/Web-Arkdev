<?php

require_once(__DIR__ . '/../Repository/TrackRepository.php');

$data = $_GET;

$hasErrors = false;


if (!isset($data['id']) || empty($data['id'])) {
    $hasErrors = true;
}
$success = false;

if ($hasErrors === false) {
    $trackRepo = new TrackRepository();
    $success = $trackRepo->deleteById($data['id']);
}

if ($success) {
    header('Location: /views/trackDashboard.php');
    exit();
}