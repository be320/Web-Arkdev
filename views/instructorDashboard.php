<?php
require_once(__DIR__ . '/../app/Repository/InstructorRepository.php');
require_once(__DIR__ . '/../app/Controllers/getInstructors.php');
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

    <title>Instructor | Dashboard</title>
</head>

<?php
    require_once(__DIR__.'/layout/header.php');
?>

<!------------------------------------------------------------------------------------------------------------------->
<div class="main">
    <div class="main-img">
        <img style="height:190px"src="../images/books.jpg" class="banner" alt="banner"/>
    </div>
    <form method="get" action="">
    <div style="padding-top:43px; padding-left:210px; marginbackground-color:none;" id="navbar">
        <br><br><br>
        <input type="text" class="form-control col-2 d-inline" placeholder="Instructor Name" name="instructorName" >
        <input type="submit" class="form-control btn-primary col-1 d-inline" value="Filter" name="filter">
    </div>
    </form>
<main class="grid">

<?php
    foreach ($instructors as &$instructor) {

    echo ' <article>';
    echo ' <img style="height:190px" src="../images/'.$instructor->getImagePath().'"'.' alt="Sample photo">';
    echo ' <div class="text">';
    echo '<p>';
    echo '<b style="text-decoration:underline">Name:</b><br>'.$instructor->getName().'<br>';
    echo '<b style="text-decoration:underline">Email:</b><br>'.$instructor->getEmail().'<br>';
    echo '<b style="text-decoration:underline">Bio: </b><br>'.$instructor->getBio().'<br>';

    echo'  </p>';
    echo' <a class="btn btn-primary m-lg-1" href="../views/instructorEdit.php?id=' . $instructor->getInstructorId(). '">Edit</a> ';
    echo' <a class="btn btn-danger m-lg-1" href="../app/Controllers/deleteInstructor.php?id=' . $instructor->getInstructorId(). '">Delete</a> ';
    echo' </div>';
    echo'</article>';
    }
?>

</main>
</div>
<?php
    require_once(__DIR__.'/layout/footer.php');
?>