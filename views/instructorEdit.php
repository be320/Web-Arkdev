<?php
require_once(__DIR__ . '/../app/Repository/InstructorRepository.php');
require_once(__DIR__.'/../app/includes/sessionStart.php');
require_once(__DIR__.'/../app/includes/sessionAuth.php');

// Check if there are parameter in Get
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo 'There is no parameter id in requested URL.';

    exit();
}

$instructorRepository = new InstructorRepository();
$instructor = $instructorRepository->getById($id);

// Check if there are exist user with $user_id
if (!$instructor) {
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

  <?php
    require_once(__DIR__.'/layout/header.php');
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
                    <h2 class="auth-title"> Edit Instructor Information </h2>
                </div>
                <form id="Instructor_Form" action="/app/Controllers/updateInstructor.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <i class="far fa-user"></i>

                        <input type="hidden" name="id" value="<?php echo $instructor->getInstructorId() ; ?>" >


                        <label for="name">Name</label>
                        <input id="name" type="name" placeholder="Edit Your Name" name="name" class="form-control" value="<?php echo $instructor->getName(); ?>" required/>
                    </div>
             
                    <div class="form-group">
                        <i class="fa fa-envelope"></i>
                        <label for="email">Email</label>
                        <input id="email" type="email" placeholder="Edit Your Email" name="email"  class="form-control" value="<?php echo $instructor->getEmail(); ?>"required/>
                    </div>
                    
                    <div class="form-group">
                        <i class="fa fa-pencil"></i>
                        <label for="Bio">Bio</label>
                        <textarea id="bio" placeholder="Add info..." name="bio"  class="form-control" required> <?php echo $instructor->getBio();?> </textarea>
                    </div>
                    
                   <div class="form-group">
                        <i class="fas fa-camera"></i>
                        <label for="image">add image</label>
                        <input type="file" id="instructorImage"  name="image_path" class="form-control" accept="image/*">
                            </div>

                    <div class="text-center submit-btn">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                
            </div>
        </div>
    </div>
</div>

<?php
    require_once(__DIR__.'/layout/footer.php');
?>