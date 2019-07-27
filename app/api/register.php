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
 * "img_path": "optional"
 * }
 *  status -> 0 means user was created
 *  status -> 1 means couldn't insert user in database
 *  status -> 2 means email is already registered
 *  status -> 3 means paramters sent are invalid
 *
 */
require_once(__DIR__ . '/../Repository/StudentRepository.php');
require_once(__DIR__ . '/../includes/uploadFile.php');

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
    $response["status"] = 2;
    $response["message"] = "email already registerd";
    echo json_encode($response);
    exit();
}

//*** Insert request data into DB ***//
$success = false;

$response = [];

if ($hasErrors === false) {
    $success = $studentRepo->create($data);

    // Start upload user image if user created successfully
    if ($success) {
        $response["status"] = 0;

        $filePath = uploadFile();
        if ($filePath != false) {
            $studentRepo->updateImagePath($data['email'], $filePath);
            $response['message'] = "User created and img was successfully uploaded";

        } else {
            $response['message'] = "User created but couldn't upload img";

        }
    } else {
        $response["status"] = 1;
        $response["message"] = "couldn't create user try again later";

    }
} else {
    $response["status"] = 3;
    $response["message"] = "invalid or missing paramters";

}

echo json_encode($response);
