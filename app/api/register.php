<?php
/**
 * to register send json data like so
 * {
 * "name" : "shehab",
 * "email": "shehab20@gmail.com",
 * "password": "12345",
 * "gpa": "3.5",
 * "level": "junior",
 * "gender": "m",
 * }
 *  status -> 0 means user was created
 *  status -> 1 means couldn't insert user in database
 *  status -> 2 means paramters sent are invalid
 *  status -> 3 means email is already registered
 *
 */
require_once(__DIR__ . '/../Repository/StudentRepository.php');
require_once(__DIR__ . '/../includes/uploadImage.php');


$inputJSON = file_get_contents('php://input');
$data = json_decode($inputJSON, true);


$hasErrors = false;

// name validate
if (!isset($data['name']) || empty($data['name'])) {
    $hasErrors = true;
}
// Validate email
if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
    $hasErrors = true;
}

// validate password
if (!isset($data['password']) || empty($data['password'])) {
    $hasErrors = true;
}

// validate gpa
if (!isset($data['gpa']) || empty($data['gpa'])) {
    $hasErrors = true;
}

// validate level
if (!isset($data['level']) || empty($data['level'])) {
    $hasErrors = true;
}

// validate gender
if (!isset($data['gender']) || empty($data['gender'])) {
    $hasErrors = true;
}


//validate that email doesn't exist in database
$studentRepo = new StudentRepository();
$check = $studentRepo->getByEmail($data['email']);

if ($check != null) {
    $response["status"] = 3;
    $response["message"] = "email already registered";
    echo json_encode($response);
    exit();
}



//*** Insert request data into DB ***//

$response = [];

if($hasErrors) {
    $response["status"] = 2;
    $response["message"] = "invalid or missing parameters";
    echo json_encode($response);
    exit();
}

$success = $studentRepo->create($data, $_FILES);
$student = $studentRepo->login($data['email'], $data['password']);

// Start upload user image if user created successfully
if ($success) {
    $response["status"] = 0;
    $response['message'] = "User created";
    $response['account'] = [
        'id'=>$student->getId(),
        'name'=>$student->getName(),
        'email'=>$student->getEmail(),
        'level'=>$student->getLevel(),
        'gpa'=>$student->getGpa(),
        'gender'=>$student->getGender(),
    ];

    // if(isset($_FILES['image_path'])) {
    //     $filePath = uploadFile();
    //
    //     if ($filePath != false) {
    //         $studentRepo->updateImagePath($data['email'], $filePath);
    //         $response['message'] = $response['message'] . " and img was successfully uploaded";
    //
    //     } else {
    //         $response['message'] = $response['message'] . " but couldn't upload img";
    //     }
    // }

} else {
    $response["status"] = 1;
    $response["message"] = "couldn't create user try again later";

}

echo json_encode($response);
