<?php

require_once(__DIR__ . '/../app/Repository/InstructorRepository.php');

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

<body>
    <header>
 
<nav class="navbar fixed-top navbar-expand-lg navbar-dark indigo">
        <a href="home_mm.html" class="navbar-brand" style="color: #a2a2a2"><strong>Welcome</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                
				<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Admins
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="createAdmin_basma.html">Create</a>
          <a class="dropdown-item" href="adminDashboard_mm.php">Dashboard</a>
        </div>
				
				<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Instructors
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="createInstructor_basma.php">Create</a>
          <a class="dropdown-item" href="instructorDashboard_mm.html">Dashboard</a>
        </div>
                
				
				<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Students
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="createStudent_basma.html">Create</a>
          <a class="dropdown-item" href="studentDashboard_mm.php">Dashboard</a>
        </div>
                
				
				<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Courses
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="createCourse_basma.php">Create</a>
          <a class="dropdown-item" href="courseDashboard_mm.php">Dashboard</a>
        </div>
				<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Tracks
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="createTrack_basma.html">Create</a>
          <a class="dropdown-item" href="trackDashboard_mm.html">Dashboard</a>
		  
        </div> 
		
			<li class="nav-item dropdown">
			<a role="button" href="teach.html" class="navbar" style="color: #a2a2a2">Teach</a>
       
		
            </ul>
			<ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
        </div>
    </nav>
	
</header>
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
                <form id="Instructor_Form" action="/ArkDevProject2/app/Controllers/updateInstructor.php" method="post" enctype="multipart/form-data">
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
                    
                   <!-- <div class="form-group">
                        <i class="fas fa-camera"></i>
                        <label for="image">add image</label>
                        <input type="file" id="instructorImage" name="image" class="form-control" accept="image/*">

                            </div> -->

                    <div class="text-center submit-btn">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                
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