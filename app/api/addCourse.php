<?php
require_once(__DIR__ . '/../Repository/EnrollmentRepository.php');
require_once(__DIR__ . '/../Repository/StudentRepository.php');
require_once(__DIR__ . '/../Repository/CourseRepository.php');

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

$hasErrors = false;

$courseID = $input['course_id'];
$studentID = $input['student_id'];

if (!isset($courseID) || empty($courseID))
    $hasErrors = true;
else if (!isset($studentID) || empty($studentID))
    $hasErrors = true;

if($hasErrors === true) {
    $response['status'] = 2;
    $response['message'] = "a parameter is empty";
    echo json_encode($response);
    exit();
}


$enrollRepo = new EnrollmentRepository();
$studentRepo = new StudentRepository();
$courseRepo = new CourseRepository();


$student = $studentRepo->getById($studentID);
//course getbyid has a problem when quering non existing course
$course = $courseRepo->getByIdAsoc($courseID);
$enrollment = $enrollRepo->getEnrollment($studentID, $courseID);


if(!$student) {
    $response['status'] = 1;
    $response['message'] = "student doesn't exist";
    echo json_encode($response);
    exit();
}
else if(!$course) {
    $response['status'] = 2;
    $response['message'] = "course doesn't exist";
    echo json_encode($response);
    exit();
}
else if($enrollment) {
    $response['status'] = 3;
    $response['message'] = "student already enrolled in course";
    echo json_encode($response);
    exit();
}
else {
    $result = $enrollRepo->addCourse($studentID, $courseID);
    if($result) {
        $response['status'] = 0;
        $response['message'] = "Successfully added the course";
    }
    else {
        $response['status'] = 4;
        $response['message'] = "couldn't add course try again later";
    }

    echo json_encode($response);
}
