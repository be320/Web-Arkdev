<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h1>hello Welcome Back :D</h1>
<?php
    //require_once('/../includes/sessionStart.php');
    session_start();
    print_r($_SESSION);
    echo '<h2>'.$_SESSION['name'].'</h2>';
?>
</body>
</html>