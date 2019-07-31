<!DOCTYPE html>
<html lang= "en">
    <head>
         <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
      
        <title>New Student</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<header>
 
<?php
require_once(__DIR__.'/../app/Controllers/header.php');
?>

<body>

       <div class="main">
     
	 <div class="main-img">
        <img src="../images/books.jpg" class="banner" alt="banner"/>
    </div>
	<br><br><br>
             <div class="container">
              <div class="row justify-content-center align-items-center ">
                   <div class="col-sm-6 align-self-center auth-wrapper">
                        <div class="auth-intro">
                            <h1 style="margin-top: 75px;" class="auth-title">New Student</h1>
            <form id="NewStudentForm" action="/../app/Controllers/createStudent.php" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                     <i class="far fa-user"></i>
                     <label for="name">Name:</label>
                     <input id="Name" name="name" type="text" placeholder="Enter your full name" class="form-control" required>
                 </div>
                
                <div class="form-group">
                     <i class="far fa-envelope"></i>
                     <label for="email">Email:</label>
                     <input id="email" name="email" type="email" placeholder="Enter your email as emailname@...com" class="form-control" required>
                 </div>
                
                 <div class="form-group">
                     <i class="far fa-key"></i>
                     <label for="password">Password:</label>
                     <input id="password1" name="password" type="password" placeholder="Enter your password" class="form-control" required>
                 </div>
                
                 <div class="form-group">
                     <i class="far fa-key"></i>
                     <label for="password">Reenter password:</label>
                     <input id="password2" name="password2" type="password" placeholder="Reenter your Password" class="form-control" required>
                 </div>
				 
				  <label for="level">Level: </label>
                        <select class="form-control" name="level" id="level">
                        <option value="0">.....</option>
                        <option value="Freshmen">Freshman</option>
                        <option value="Sophomore">Sophomore</option>
                        <option value="Junior">Junior</option>
                        <option value="Senior 1">Senior 1</option>
                        <option value="Senior 2">Senior 2</option>
                        </select>
                
				<div class="form-group">
                     <label for="gpa">GPA:</label>
                     <input id="gpa" name="gpa" type="gpa" placeholder="Enter your gpa" class="form-control" required>
                 </div>
				
				<div class="form-group">
				<label for="gender">Gender:</label>


                <input type="radio" name="gender" value="male"> Male    
                <input type="radio" name="gender" value="female" > Female



				 </div>
				
				 
				 <div class="form-group">



				 

				 <label for="pic">Profile Image:: </label>
				 <input id="pic" type="file" name="image_path" accept="image/*" class="form-control">
				


				</div>
				
                 <div class="text-center submit-btn">
                    <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
                 </div>
				 
				  </form>
                 </div>
              </div>
         </div>
    </div>
	</div>
            
<script src="../js/jquery-3.3.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.validate.js"></script>
<script src="../js/main.js"></script>
            
</body>
    </body>
</html>
