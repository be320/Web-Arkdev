<?php
require_once(__DIR__ . '/../app/Repository/TrackRepository.php');
$trackRepo = new TrackRepository();
$tracks = $trackRepo->getAll();
?>

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="../css/main.css">

        <title>Track | Dashboard</title>
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
            <div id="navbar">
                <ul>
                    <li><input style="border:2px solid blue" type="text" placeholder="Name"></li>
                    <li><input style="width:70px; text-align:left;" type="button" value="Search"></li>
                </ul>
            </div>
            <article class="main container">
                <section>
                    <div id="1">
                        <table border="1" class="table table-striped">  <!--to auto increment # coln-->
                            <thead>
                                <tr  class="table-info">
                                    <th style="text-align:center; border-bottom:2px solid black; border-right:1px solid black;" scope="col">#</th>
                                    <th style="text-align:center; border-bottom:2px solid black;border-right:1px solid black;" scope="col">Track Name</th>
                                    <th style="text-align:center; border-bottom:2px solid black; padding-left:10px" colspan="2" scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody> 

                                <?php
                                foreach ($tracks as $track) {
//                         <tr>
//			 <td></td> numbered 1 as border
//			  <td>Communication</td>
//			  <td style="text-align:center;"><button style="background-color:BLUE; font-weight:bold; color:white; border:2px solid black;" type="button">Edit</button></td>
//			  <td style="text-align:center;"><button style="background-color:RED; font-weight:bold; color:white; border:2px solid black;" type="button">Delete</button></td>
//			  
//			  
//			</tr>-->

                                    echo '<tr>';
                                    echo '<th scope="row">' . $track->getId() . '</th>';
                                    echo '<td>' . $track->getName() . '</td>';
                                    echo '<td>';
                                    echo '<a class="btn btn-primary" href="/views/trackEdit_nada.php?id=' . $track->getId() . '">Edit</a>';
                                    echo '<a class="btn btn-danger m-lg-1" href="/app/Controllers/deleteTrack.php?id=' . $track->getId() . '">Delete</a>';
                                    echo '</td>';

                                    echo '</tr>';
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
