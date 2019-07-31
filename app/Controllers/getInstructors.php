<?php
require_once(__DIR__.'/../Repository/InstructorRepository.php');
$data = $_GET;
$instructors = [];
$instructorRepo = new InstructorRepository();
if(isset($data['filter']) && !empty($data['filter']) && !empty($data['instructorName'])){
    $instructors = $instructorRepo->getByInstructorName($data['instructorName']);
}
else{
    $instructors = $instructorRepo->getAll();
}