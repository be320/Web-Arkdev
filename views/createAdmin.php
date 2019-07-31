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
      
        <title>Register</title>
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
                            <h1 class="auth-title">Register Admin</h1>
							<script type="text/javascript">

  function checkForm(form)
  {
    if(form.name.value == "") {
      alert("Error: name cannot be blank!");
      form.name.focus();
      return false;
    }
    re = /^\w+$/;
    if(form.password.value != "" && form.password.value == form.password2.value) {
      if(form.password.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.password.focus();
        return false;
      }
      if(form.password.value == form.name.value) {
        alert("Error: Password must be different from name!");
        form.password.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.password.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.password.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.password.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.password.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.password.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.password.focus();
        return false;
      }
    } 
  else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.password.focus();
      return false;
    }
    return true;
  }

</script>
           <form ... onsubmit="return checkForm(this);" action="/app/Controllers/createAdmin.php" method="post">
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
                     <i class="fa fa-key"></i>
                     <label for="password">Password:</label>
                     <input id="password1" name="password" type="password" placeholder="Enter password" class="form-control" required>
                 </div>
                
                 <div class="form-group">
                     <i class="fa fa-key"></i>
                     <label for="password">Reenter password:</label>
                     <input name="password2" id="password2" name="password2" type="password" placeholder="Reenter Password" class="form-control" required>
                 </div>
                
                 <div class="text-center submit-btn">
                    <button name="submit" type="Submit" class="btn btn-primary" >Submit</button>
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