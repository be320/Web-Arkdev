<?php
require_once(__DIR__ . '../app/Repository/StudentRepository.php');
$studentRepo = new StudentRepository();
$students = $studentRepo->getAll();
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

    <title>Student | Dashboard</title>
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
        <img src="../images/books.jpg" class="banner" alt="banner"/>
    </div>
	<div style="padding-top:43px; padding-left:180px; marginbackground-color:none;" id="navbar">
		<ul>
		<li><input style="border:2px solid #6da17b" type="text" placeholder="Name"></li>
		<li><input style="border:2px solid #6da17b" type="select" placeholder="GPA"></li>
		<li>
		<select style="font-weight:bold;border:2px solid #6da17b;margin-left:4px; height:30px">
			<option style="color:#6da17b;font-weight:bold;">Gender:</option>
			<option>Male</option>
			<option>Female</option>
			
		 </select>
		</li>
		<li>
		<select style="font-weight:bold;border:2px solid #6da17b;margin-left:4px; height:30px">
			<option style="color:#6da17b;font-weight:bold;">Level:</option>
			<option>Freshman</option>
			<option>Sophomore</option>
			<option>Junior</option>
			<option>Senior1</option>
			<option>Senior2</option>
			
		 </select>
		</li>
		<li><input style="border:2px solid white; width:160px; background-color:#6da17b; color: white; text-align:center;" type="button" value="Search Student"></li>
		</ul>
	</div>
<main class="grid">
    <?php

foreach ($students as $student)
{

   echo '<article>';
    echo'<img src="../images/'.$student->getImagePath().'" alt="Sample photo">';
   echo' <div class="text">';
    echo' <p>';
    echo' <b style="text-decoration:underline">ID:</b><br>'.$student->getId().'<br>';
	 echo' <b style="text-decoration:underline">Name:</b><br>'.$student->getName().'<br>';
	 echo' <b style="text-decoration:underline">Email:</b><br>'.$student->getEmail().'<br>';
	  echo' <b style="text-decoration:underline">Gender:</b><br>'.$student->getGender().'<br>';
	  echo'<b style="text-decoration:underline">GPA:</b><br>'.$student->getGpa().'<br>';
	  echo'<b style="text-decoration:underline">Level:</b><br>'.$student->getLevel().'<br>';

	   echo'</p> ';
      echo' <a class="btn btn-primary m-lg-1" href="/views/studentEdit_nada.php?id=' . $student->getId() . '">Edit</a> ';
      echo' <a class="btn btn-danger m-lg-1" href="/app/Controllers/deleteStudent.php?id=' . $student->getId() . '">Delete</a> ';
     echo'</div> ';
   echo'</article> ';

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
