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
      
        <title>Create Track</title>
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
                            <h1 class="auth-title">New Track</h1>
            
              
                            <form id="NewTrackForm" action="/app/Controllers/createTrack.php" method="post">
                 <div class="form-group">
                     <i class="far fa-user"></i>
                     <label for="name">Name</label>
                     <input id="Name" name="name" type="text" placeholder="Enter Track name" class="form-control" required>
                 </div>
                 
                 <div class="text-center submit-btn">
                    <button name="submit" type="Submit" class="btn btn-primary" >Submit</button>
                 </div>
                
                 </form>
                 </div>
              </div>
         </div>
    </div>
            
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/main.js"></script>
            
</body>
</html>