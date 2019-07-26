<?php
require_once(__DIR__ . '/../Repository/TrackRepository.php');


$data = $_POST;

$hasErrors = false;


// **ID is incremental**
//if (!isset($data['id']) || empty($data['id'])) {
//    $hasErrors = true;
//}

if (!isset($data['name']) || empty($data['name'])) {
    $hasErrors = true;
}


$success = false;

if ($hasErrors === false) {
    $trackRepo = new TrackRepository();
    $success = $trackRepo->create($data);
}


//*** Handle redirection after saving ***//
if ($success) {
    header('Location: /views/index.html');
    exit();
}
