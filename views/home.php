<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<a class="nav-link" href="../app/Controllers/logout.php"><button type='button'>logout</button></a>
<a class="nav-link" href="../views/adminEdit.html"><button type='button'>edit account</button></a>
<h1>hello Welcome Back :D</h1>
<?php
    require_once(__DIR__.'/../app/Models/Admin.php');
    require_once(__DIR__.'/../app/includes/sessionStart.php');
    if(isset($_SESSION['admin'])){
        $admin = $_SESSION['admin'];
        echo '<h2>'.$admin->getname().'</h2>';
    }else{
        echo '<h2>please login to access home</h2>';  
    }
?>
</body>
</html>