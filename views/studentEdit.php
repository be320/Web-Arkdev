<?php

require_once(__DIR__ . '/../app/Repository/StudentRepository.php');

// Check if there are parameter in Get
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo 'There is no parameter id in requested URL.';
    exit();
}

$studentRepository = new StudentRepository();
$student = $studentRepository->getById($id);

// Check if there are exist user with $user_id
if (!$student) {
    echo 'No Student with the selected ID';
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>editStudent</title>
</head>
<body>
<form action="/../app/Controllers/updateStudent.php" method="post">
    <input type="hidden" name="id" value="<?php echo $student->getId(); ?>">
    <input type="text" id="studentName" name="name" placeholder="Student Name" value="<?php echo $student->getName(); ?>">
    <input type="text" id="studentEmail" name="email" placeholder="Student Email" value="<?php echo $student->getEmail(); ?>">
    <input type="number" id="studentGpa" name="gpa" max="4" min="0" placeholder="GPA" value="<?php echo $student->getGpa(); ?>">
    <input type="radio" id="genderMale" value="male" name="gender" value="<?php echo $student->getGender(); ?>">Male
    <input type="radio" id="genderFemale" value="female" name="gender" value="<?php echo $student->getGender(); ?>">Female
    <select name="level" id="level" value="<?php echo $student->getLevel(); ?>">
        <option value="Level">Level</option>
        <option value="Freshman">Freshman</option>
        <option value="Sophomore">Sophomore</option>
        <option value="Junior">Junior</option>
        <option value="Senior1">Senior1</option>
        <option value="Senior2">Senior2</option>
    </select>
    <input type="file" id="studentImage" name="image" accept="image/*" value="<?php echo $student->getImagePath(); ?>">
    <input type="submit" name="submit" id="submit">
</form>
</body>
</html>