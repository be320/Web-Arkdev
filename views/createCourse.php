<?php
require_once(__DIR__.'/../app/Repository/TrackRepository.php');
require_once(__DIR__.'/../app/Models/Track.php');
require_once(__DIR__.'/../app/Controllers/createCourse.php');
require_once(__DIR__.'/../app/includes/sessionStart.php');
require_once(__DIR__.'/../app/includes/sessionAuth.php');
$data = $_GET;
$flag = 0;

//To show a message box incase of an error
if(isset($data['error']) && !empty($data['error'])){
    //in case of existence of such Course Name
    if($data['error'] === 'errorNameExists'){
        $flag = 1;
    }
    //in case of no Track with such ID
    elseif ($data['error'] === 'errorTrackNotExist'){
        $flag = 2;
    }
}


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

    <title>New Course</title>
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

    <?php
    if($flag === 1){
    echo '<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>WARNING!</strong> There is a course with such Name. Kindly Choose another Name</div>';
    }
    elseif ($flag === 2){
        echo '<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>WARNING!</strong> There is no track with such ID</div>';
    }
    ?>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-6 align-self-center auth-wrapper">
                <div class="auth-intro">
                    <h1 class="auth-title">Create Course</h1>
                        <?php if($flag === 0){?>
                    <form id="NewCourseForm" method="post" action="\app\Controllers\createCourse.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">CourseName:</label>
                            <input id="Name" name="name" type="text" placeholder="Enter course name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="trackName">Track Name:</label>
                            <select name='track_id' class="form-control">
                                <?php foreach ($tracks as $track): ?>
                                    <option value="<?php echo $track->getId() ?> "><?php echo $track->getName() ?> </option>
                                <?php endforeach ?>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input id="description" name="description" type="text" placeholder="Enter course description" class="form-control" required style="height: 70px">
                        </div>

                        <div class="form-group">
                                <label for="pic">Course Image: </label>
                                <input id="pic" type="file" name="image_path" accept="image/*" class="form-control" required>
                        </div>


                        <div class="text-center submit-btn">
                            <button type="Submit" name="create_course" class="btn btn-primary" >Submit</button>
                        </div>

                    </form>
                        <?php } ?>
                        <?php if($flag != 0){ ?>
                            <form id="NewCourseForm" method="post" action="\app\Controllers\createCourse.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">CourseName:</label>
                                    <input id="Name" name="name" type="text" placeholder="Enter course name" class="form-control" value="<?php echo $data['name']?>" required>
                                </div>


                                <div class="form-group">
                                    <label for="trackName">Track Name:</label>
                                    <select name='track_id' class="form-control">
                                        <?php foreach ($tracks as $track): ?>
                                            <option value="<?php echo $track->getId() ?> "><?php echo $track->getName() ?> </option>
                                        <?php endforeach ?>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <input id="description" name="description" type="text" placeholder="Enter course description" value="<?php echo $data['description']?>" class="form-control" required style="height: 70px">
                                </div>

                                <div class="form-group">
                                    <label for="pic">Course Image: </label>
                                    <input id="pic" type="file" name="image_path" accept="image/*" class="form-control" required>
                                </div>


                                <div class="text-center submit-btn">
                                    <button type="Submit" name="create_course" class="btn btn-primary" >Submit</button>
                                </div>

                            </form>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once(__DIR__.'/layout/footer.php');
?>