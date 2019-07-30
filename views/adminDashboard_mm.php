<?php
require_once(__DIR__ . '/../app/Repository/AdminRepository.php');
require_once(__DIR__.'/../app/includes/sessionStart.php');
require_once(__DIR__.'/../app/includes/sessionAuth.php');

$adminRepo = new AdminRepository();
$admins = $adminRepo->getAll();
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
        <a href="home_mm.html" class="navbar-brand" style="color: #a2a2a2"><strong>Welcome</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admins
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="createAdmin_basma.html">Create</a>
                        <a class="dropdown-item" href="adminDashboard_mm.php">Dashboard</a>
                    </div>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Instructors
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="createInstructor_basma.php">Create</a>
                        <a class="dropdown-item" href="instructorDashboard_mm.html">Dashboard</a>
                    </div>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Students
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="createStudent_basma.html">Create</a>
                        <a class="dropdown-item" href="studentDashboard_mm.php">Dashboard</a>
                    </div>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Courses
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="createCourse_basma.php">Create</a>
                        <a class="dropdown-item" href="courseDashboard_mm.php">Dashboard</a>
                    </div>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tracks
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="createTrack_basma.html">Create</a>
                        <a class="dropdown-item" href="trackDashboard_mm.html">Dashboard</a>

                    </div>

                <li class="nav-item dropdown">
                    <a role="button" href="teach.html" class="navbar" style="color: #a2a2a2">Teach</a>


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
    <div id="navbar">
        <ul>
            <li><input style="border:2px solid black" type="text" placeholder="Name"></li>
            <li><input style="width:70px; text-align:left;" type="button" value="Search"></li>
        </ul>
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
        <article class="main container">
            <section>
                <div>
                    <table  class="table table-striped">
                        <thead>
                        <tr  class="table-info">
                            <th style="text-align:center; border-bottom:2px solid black; border-right:1px solid black;" scope="col">ID</th>
                            <th style="text-align:center; border-bottom:2px solid black;border-right:1px solid black;" scope="col">Name</th>
                            <th style="text-align:center; border-bottom:2px solid black; border-right:2px solid black; " scope="col">Email</th>
                            <th style="text-align:center; border-bottom:2px solid black; padding-left:10px" colspan="2" scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        function makeSure($admin):string
                        {
                            require_once(__DIR__.'/../app/Models/Admin.php');
                            require_once(__DIR__.'/../app/includes/sessionStart.php');
                            if(isset($_SESSION['admin'])){
                                $x = $_SESSION['admin'];
                                $id=$x->getid();
                            }

                            if($admin->getId()===$id){
                                return ' disabled ';
                            }
                            return '';
                        }
                        foreach ($admins as $admin){
                            echo('<tr>');
                            echo('<th>'.$admin->getId() .'</td>');
                            echo('<td>'.$admin->getName().'</td>');
                            echo('<td style="border-right:2px solid black;">' . $admin->getEmail() . '</td>');
                            echo('<td style="text-align:center;"><a href="/views/adminEdit_nada.php?id=' . $admin->getId() . '"><button type="button" class="btn btn-primary">Edit</button></a></td>');
                            echo('<td style="text-align:center;"><a href="/../app/Controllers/deleteAdmin.php?id=' . $admin->getId() . '"><button '.makeSure($admin).'type="button" class="btn btn-danger">Delete</button></a></td>');
                            echo('</tr>');
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </article>
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
