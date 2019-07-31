<?php
require_once(__DIR__.'/../app/Repository/InstructorRepository.php');
require_once(__DIR__.'/../app/Repository/CourseRepository.php');
$instructorRepo = new InstructorRepository();
$courseRepo = new CourseRepository();

$instructors = $instructorRepo->getAll();
$courses = $courseRepo->getAll();
