<?php
require_once(__DIR__.'/../app/includes/sessionStart.php');
require_once(__DIR__.'/../app/includes/sessionAuth.php');
require_once(__DIR__ . '/../app/Repository/AdminRepository.php');

// Check if there are parameter in Get
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo 'There is no parameter id in requested URL.';
    exit();
}

// select and get the Admin from DB with $id
$AdminRepository = new AdminRepository();
$Admin = $AdminRepository->getById($id);

// Check if there are exist Admin with $id
if (!$Admin) {
    echo 'No Admin with the selected ID';
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
    <title>Admin edit</title>
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
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-6 align-self-center auth-wrapper">
                <div class="auth-intro">
                    <h2 class="auth-title">Update</h2>
                </div>
                <form id="admin_Form" method="post" action="/app/Controllers/updateAdmin.php">
                  
                <input type="hidden" name="id" value="<?php echo $Admin->getId(); ?>">

                    <div class="form-group">
                        <i class="far fa-user"></i>
                        <label for="name">Name</label>
                        <input id="firstName" value="<?php echo $Admin->getname(); ?>" name="name" type="text"
                   placeholder="First Name" class="form-control"
                   required/>
                    </div>
                
                    <div class="form-group">
                       <i class="fa fa-envelope"></i>
                        <label for="email">Email</label>
                        <input id="email" name="email" value="<?php echo $Admin->getEmail(); ?>" type="text" placeholder="Email" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label for="pass" hidden>Password</label>
                        <input id="pass" type="password" name="password" value="<?php echo $Admin->getPassword(); ?>" class="form-control" disabled required hidden/>
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