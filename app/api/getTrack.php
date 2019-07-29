<?php
require_once(__DIR__ . '/../Repository/TrackRepository.php');

$response = [];

$trackRepo = new TrackRepository();

$tracks = $trackRepo->getAll();

foreach ($tracks as $t) {
    $obj = ['id' => $t->getid(), 'name' => $t->getname()];
    array_push($response, $obj);
}

$result['tracks'] = $response;
echo json_encode($result);
