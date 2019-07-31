<?php
require_once(__DIR__ . '/../app/Repository/StudentRepository.php');
$studentRepo = new StudentRepository();
$students = [];
$data = $_GET;
if( isset($data['filter']) && !empty($data['filter']) ){
    if( (isset($data['name']) && !empty($data['name'])) && (isset($data['email']) && empty($data['email'])) && !isset($data['gender']) && !isset($data['level']) ){
        $students = $studentRepo->getByName($data['name']);
    }
    elseif ((isset($data['name']) && empty($data['name'])) && (isset($data['email']) && !empty($data['email'])) && !isset($data['gender']) && !isset($data['level'])){
        $students = $studentRepo->getByEmail($data['email']);
    }
    elseif ((isset($data['name']) && empty($data['name'])) && (isset($data['email']) && empty($data['email'])) && isset($data['gender']) && !isset($data['level'])){
        $students = $studentRepo->getByGender($data['gender']);
    }
    elseif ((isset($data['name']) && empty($data['name'])) && (isset($data['email']) && empty($data['email'])) && !isset($data['gender']) && isset($data['level'])){
        $students = $studentRepo->getByLevel($data['level']);
    }

}
else {
    $students = $studentRepo->getAll();
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

    <title>Student | Dashboard</title>
</head>

<body>
<header>
 
<?php
    require_once(__DIR__.'/../app/Controllers/header.php');
  ?>
<!------------------------------------------------------------------------------------------------------------------->

<div class="main">
    <div class="main-img">
        <img src="../images/books.jpg" class="banner" alt="banner"/>
    </div>

    <form method="get" action="/views/studentDashboard_mm.php">
        <div style="padding-top:43px; padding-left:210px; marginbackground-color:none;" id="navbar">
            <ul>
                <li><input style="border:2px solid #6da17b" type="text" name="name" placeholder="Name"></li>
                <li><input style="border:2px solid #6da17b" type="text" name="email" placeholder="Email"></li>
                <li><select style="font-weight:bold;border:2px solid #6da17b;margin-left:4px; height:30px" name="gender" >
                    <option style="color:#6da17b;font-weight:bold;" disabled selected>Gender:</option>
                    <option>Male</option>
                    <option>Female</option>
                </select></li>
                <li>
                    <select style="font-weight:bold;border:2px solid #6da17b;margin-left:4px; height:30px" name="level">
                        <option style="color:#6da17b;font-weight:bold;" disabled selected>Level:</option>
                        <option>Freshman</option>
                        <option>Sophomore</option>
                        <option>Junior</option>
                        <option>Senior 1</option>
                        <option>Senior 2</option>

                    </select>
                </li>
                <li><input style="border:2px solid white; width:130px; background-color:#6da17b; color: white; text-align:center;" type="submit" value="Filter" name="filter"></li>
            </ul>
        </div>
    </form>

<main class="grid">
    <?php

foreach($students as $student)
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
    <?php
    //To show a message box incase of no results
    if(empty($students)){
        echo'<div class="alert alert-warning alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>NOTE!</strong> No Students with such properties.</div>';
    }
    ?>
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
