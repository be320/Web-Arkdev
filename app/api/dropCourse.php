<?php
// in order to use this api >>> you send a 
// student_id
// course_id 
// then it will drop the course if the student is already enrolled in it

// @return 
// it return 'status' (0) if success , (1) if failed, (2) if the inputs are incorrect
// and a 'message' with the description.
require_once(__DIR__ . '/../Repository/EnrollmentRepository.php');

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

$hasErrors = false;

$course = $input['course_id'];
$student = $input['student_id'];

if (!isset($course) || empty($course))
    $hasErrors = true;
else if (!isset($student) || empty($student))
    $hasErrors = true;


if ($hasErrors === false) {
    $studentRepo = new EnrollmentRepository();
    $result = $studentRepo->dropCourse($student, $course);

    if (!$result){
        $response['status'] = 1;
        $response['message'] = "Failed to drop Course or IDs don't exist";
    }
    else{
        $response['status'] = 0;
        $response['message'] = "Successfully dropped from the course";
    }
}
else{
    $response['status'] = 2;
    $response['message'] = "a parameter is empty";
}

$response = json_encode($response);

echo $response;
exit();