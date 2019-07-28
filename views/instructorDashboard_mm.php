<?php

require_once(__DIR__ . '/../app/Repository/InstructorRepository.php');
$instructorRepo = new InstructorRepository();
$instructors = $instructorRepo->getAll();
//print_r($instructors);
//exit();
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

    <title>Instructor | Dashboard</title>
</head>

<body>
<header>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark indigo">
        <a class="navbar-brand" href="#"><strong>Welcome</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
				<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Admins
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Create</a>
          <a class="dropdown-item" href="#">Dashboard</a>
        </div>
				
				<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Instructors
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Create</a>
          <a class="dropdown-item" href="#">Dashboard</a>
        </div>
                
				
				<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Students
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Create</a>
          <a class="dropdown-item" href="#">Dashboard</a>
        </div>
                
				
				<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Courses
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Create</a>
          <a class="dropdown-item" href="#">Dashboard</a>
        </div>
				<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Tracks
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Create</a>
          <a class="dropdown-item" href="#">Dashboard</a>
        </div> 
            </ul>
			<ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
        </div>
    </nav>

</header>

<!------------------------------------------------------------------------------------------------------------------->
<div class="main">
    <div class="main-img">
        <img style="height:190px"src="../images/books.jpg" class="banner" alt="banner"/>
    </div>
	 <br><br><br><br>
	<div class="container">
        <div class="row justify- align-items-center ">
<div class="col-sm-12 align-self-center auth-wrapper" style="background-color: rgb(0,0,0,0);border: 0;box-shadow: 0 0 12px 3px black;">	
  <form class="form-inline"style="align-items: center;justify-content: center;" >
        <input style="border:2px solid #6da17b" type="text" placeholder="Name">
		<input style="border:2px solid white; width:160px; background-color:#6da17b; color: white; text-align:center;" type="button" value="Search">
      </form>
	  </div>
	  </div>
	  </div>
<main class="grid">


<?php



foreach ($instructors as &$instructor) {

  echo' <article>';
  echo' <img style="height:190px" src="../images/'.$instructor->getImagePath().'"'.' alt="Sample photo">';
  echo' <div class="text">';
  echo'   <p>';
  echo'	  <b style="display: block; text-decoration:underline">Name:</b><br>'.$instructor->getName().'<br>';
  echo'	  <b style="display: block; text-decoration:underline">Email:</b><br>'.$instructor->getEmail().'<br>';
  echo'	  <b style="display: block; text-decoration:underline">Bio: </b><br>'.$instructor->getBio().'<br>';

  echo'  </p>';
  echo' <a class="btn btn-primary m-lg-1" href="../views/instructorEdit_nada.php?id=' . $instructor->getInstructorId(). '">Edit</a> ';
  echo' <a class="btn btn-danger m-lg-1" href="../app/Controllers/deleteInstructor.php?id=' . $instructor->getInstructorId(). '">Delete</a> ';
    echo' </div>';
  echo'</article>';
}

?>

</main>
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
