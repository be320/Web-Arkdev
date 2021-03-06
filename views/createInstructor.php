<?php
require_once(__DIR__.'/../app/includes/sessionStart.php');
require_once(__DIR__.'/../app/includes/sessionAuth.php');
?>
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
      
        <title>New Instructor</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

  <?php
require_once(__DIR__.'/layout/header.php');
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
                            <h1 class="auth-title">Register Instructor</h1>
                            <form action="/app/Controllers/createInstructor.php" method="post" id="NewInstructorForm" enctype="multipart/form-data">
                                <div class="form-group">
                     <i class="far fa-user"></i>
                     <label for="name">Name:</label>
                     <input id="Name" name="name" type="text" placeholder="Enter full name" class="form-control" required>
                 </div>
                
                <div class="form-group">
                     <i class="far fa-envelope"></i>
                     <label for="email">Email:</label>
                     <input id="email" name="email" type="email" placeholder="Enter email" class="form-control" required>
                 </div>
                
                 <div class="form-group">
                     <i class="fa fa-address-card"></i>
                     <label for="bio">Bio:</label>
                     <input id="bio" name="bio" type="text" placeholder="Enter bio" class="form-control" required style="height: 70px">
                 </div>
				
				<div class="form-group">
                    <i class="fa fa-image"></i>
				    <label for="pic">Profile Image: </label>
				    <input id="pic" type="file" name="image_path" accept="image/*" class="form-control">
				</div>

				  <div class="text-center submit-btn">
                    <button type="Submit" class="btn btn-primary" >Submit</button>
                 </div>

                 </form>
                 </div>
              </div>
         </div>
    </div>
	</div>
            
<?php
    require_once(__DIR__.'/layout/footer.php');
?>