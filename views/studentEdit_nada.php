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
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>project | edit</title>
</head>

<body>
   <header>
 
   <?php
    require_once(__DIR__.'/../app/Controllers/header.php');
  ?>
  
<div class="main">
    <div class="main-img">
        <img src="../images/books.jpg" class="banner" alt="banner"/>
    </div>
	<br><br><br>
    <div class="container">
        <div class="row justify-content-center align-items-center ">
            <div class="col-sm-6 align-self-center auth-wrapper">
                <div class="auth-intro">
                    <h2 class="auth-title"> Edit Student Information </h2>
                </div>
                <form id="studentForm" method="post" action="../app/Controllers/updateStudent.php">
                    <div class="form-group">
                        <i class="far fa-user"></i>
                        <input type="hidden" name="id" value="<?php echo $student->getId(); ?>">
                        <label for="name">Name</label>
                        <input id="name" type="name" placeholder="Edit Your Name" name="name" class="form-control" value="<?php echo $student->getName(); ?>" required/>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-envelope"></i>
                        <label for="email">Email</label>
                        <input id="email" type="email" placeholder="Edit Your email" name="email" class="form-control" value="<?php echo $student->getEmail(); ?>" required/>
                    </div>


                    <div class="form-group">
                       
                        <label for="gpa">GPA</label>
                        <input id="gpa" type="gpa" placeholder="Edit Your GPA" name="gpa" class="form-control" value="<?php echo $student->getGpa(); ?>" required/>
                    </div>
                    
                        
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control" name="level" id="level" value="<?php echo $student->getLevel(); ?>">
                        <option value="<?php echo $student->getLevel(); ?>"><?php echo $student->getLevel(); ?></option>
                        <option  value="Freshman">Freshman</option>
                        <option value="Sophomore">Sophomore</option>
                        <option value="Junior">Junior</option>
                        <option value="Senior1">Senior 1</option>
                        <option value="Senior2">Senior 2</option>
                        </select>
                               
                    </div>
                    <div class="text-center submit-btn">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../js/jquery-3.3.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.validate.js"></script>
<script src="../js/main.js"></script>

</body>
</html>