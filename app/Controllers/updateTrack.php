<?php
require_once(__DIR__ . '/../Repository/TrackRepository.php');


$data = $_POST;
var_dump($data);

$hasErrors = false;


 
if (!isset($data['id']) || empty($data['id'])) {
    $hasErrors = true;
}

if (!isset($data['name']) || empty($data['name'])) {
    $hasErrors = true;
}
var_dump($hasErrors);


$success = false;

if ($hasErrors === false) {
    $track = new Track();
    
    $track ->setId($data['id']);
    $track ->setName($data['name']);
    
    $trackRepo = new TrackRepository();
    $success = $trackRepo->update($track);
}


//*** Handle redirection after saving ***//
if ($success) {
    header('Location: /views/trackDashboard_mm.php');
    exit();
}