<?php
// in order to use this api >>> you send a
// student 'email'
// student 'password'

// @return
// 'id' (-1) if fails , the student id if succeeded
// it return 'status' (0) if success , (1) if failed, (2) if the inputs are incorrect
// and a 'message with the description'


// require_once(__DIR__ . '/../includes/sessionStart.php');
require_once(__DIR__ . '/../Repository/StudentRepository.php');

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

$response = [];
$hasErrors = false;

$email = $input['email'];
$password = $input['password'];

// Validate email
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $hasErrors = true;
}
//validate that password is not empty
else if (!isset($password) || empty($password)){
    $hasErrors = true;
}

if ($hasErrors === false) {
    $studentRepo = new StudentRepository();
    $result = $studentRepo->login($email, $password);

    if (!$result){
        $response['status'] = 1;
        $response['message'] = "Invalid Email or Password";

    }
    else{

        // $response['id'] = $result->getId();
        $response['status'] = 0;
        $response['message'] = "Successfully logged in";
        $response['account'] = [
            'id'=>$result->getId(),
            'name'=>$result->getName(),
            'email'=>$result->getEmail(),
            'level'=>$result->getLevel(),
            'gpa'=>$result->getGpa(),
            'gender'=>$result->getGender(),

        ];
    }
}
else{
    $response['status'] = 2;
    $response['message'] = "invalid or missing parameters";

}


$response = json_encode($response);

echo $response;
exit();
