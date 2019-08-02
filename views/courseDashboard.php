<?php
require_once(__DIR__ . '/../app/Repository/CourseRepository.php');
require_once(__DIR__ . '/../app/Repository/TrackRepository.php');
require_once(__DIR__ . '/../app/Controllers/getCourses.php');
require_once(__DIR__.'/../app/includes/sessionStart.php');
require_once(__DIR__.'/../app/includes/sessionAuth.php');
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

    <title>Course | Dashboard</title>
</head>

<?php
require_once(__DIR__.'/layout/header.php');
?>

<!------------------------------------------------------------------------------------------------------------------->
<div class="main">
    <div class="main-img">
        <img src="../images/books.jpg" class="banner" alt="banner"/>
    </div>

    <form method="get" action="">
        <div style="padding-top:43px; padding-left:210px; marginbackground-color:none;" id="navbar">
            <br><br><br>
            <input type="text" class="form-control col-2 d-inline" placeholder="Course Name" name="courseName" >
            <input type="text" class="form-control col-2 d-inline" placeholder="Track Name" name="trackName">
            <input type="text" class="form-control col-2 d-inline" placeholder="Instructor Name" name="instructorName">
            <input type="submit" class="form-control btn-primary col-1 d-inline" value="Filter" name="filter">
        </div>
        <!--
        <ul>

            <li><input style="border:2px solid #6da17b" type="text" name="courseName" placeholder="Course Name" class="form-control"></li>
            <li><input style="border:2px solid #6da17b" type="text" name="trackName" placeholder="Track Name" class="form-control"></li>

            <li><input style="border:2px solid #6da17b" type="text" name="instructorName" placeholder="Instructor Name" class="form-control"></li>
            <li><button style="border:2px solid white; width:130px; background-color:#6da17b; color: white; text-align:center;" type="submit" name="filter" class="btn btn-primary">Filter</button></li>
        </ul>
        -->
    </form>

    <?php
    if($flag === 1){
        echo '<div class="alert alert-success alert-dismissible" >
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>CONGRATS!</strong> Course added Successfully</div>';
    }elseif ($flag === 2){
        echo '<div class="alert alert-success alert-dismissible" >
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>CONGRATS!</strong> Course edited Successfully</div>';

    }
    ?>
    <main class="grid">

        <?php

        foreach ($courses as $course){
            echo '<article>';
            echo '<img src="../images/'.$course->getImagePath().'" alt="Sample photo" height="200" width="250">';
            echo '<div class="text">';
            echo '<p>';
            echo '<b style="text-decoration:underline">Name:</b><br>'. $course->getName() .'<br>';
            echo '<b style="text-decoration:underline">ID:</b><br>'. $course->getId() .'<br>';
            echo '<b style="text-decoration:underline">Description:</b><br>'.$course->getDescription().'<br>';
            echo '<b style="text-decoration:underline">Track:</b><br>'.($trackRepo->getById($course->getTrackId()))->getName(). '<br>';
            echo '<b style="text-decoration:underline">Instructors:</b><br>';
                echo '<ul>';
                $instructors = $courseRepo->getAllInstructors($course->getId());
                foreach ($instructors as $instructor){
                    echo '<li>'.$instructor['name'].'</li>';
                }
                echo '</ul>'
                . '</b>';
            echo '</p>';
            echo '<a class="btn btn-primary m-lg-1" href="/views/courseEdit.php?id='  . $course->getId() .  '">Edit</a>';
            echo '<a class="btn btn-danger m-lg-1" href="/app/Controllers/deleteCourse.php?id='  .  $course->getId().  '">Delete</a>';
            echo '</div> ';
            echo '</article>';
            $course = null;
        }

        ?>

    </main>

    <?php
    //To show a message box incase of no results
    if(empty($courses)){
        echo'<div class="alert alert-warning alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>NOTE!</strong> No Courses with such properties.</div>';
    }
    ?>

</div>
<?php
require_once(__DIR__.'/layout/footer.php');
?>