<?php
require_once(__DIR__.'/../app/Repository/CourseRepository.php');
require_once(__DIR__.'/../app/Models/Course.php');
require_once(__DIR__.'/../app/Repository/TrackRepository.php');
require_once(__DIR__.'/../app/includes/sessionStart.php');
require_once(__DIR__.'/../app/includes/sessionAuth.php');

$data = $_GET;
$flag = 0;
//var_dump($data);


if(!isset($data['id']) || empty($data['id'])){
    echo 'Error in this Request';
    exit();
}
elseif (isset($data['error']) && $data['error'] === 'errorNameExists'){
    $flag = 1;
    $trackRepo = new TrackRepository();
    $tracks = $trackRepo->getAll();
}
else {
    $courseRepo = new CourseRepository();
    $course = $courseRepo->getById($data['id']);
    $trackRepo = new TrackRepository();
    $tracks = $trackRepo->getAll();
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
    <title>project | edit</title>
</head>

<?php
require_once(__DIR__.'/layout/header.php');
?>

<div class="main">
    <div class="main-img">
        <img src="../images/books.jpg" class="banner" alt="banner"/>
    </div>
	<br><br><br>
    <?php
    if($flag === 1){
    echo '<div class="alert alert-danger alert-dismissible" >
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>WARNING!</strong> Course Name exists</div>';
    }
    ?>
    <?php if($flag === 0){ ?>
    <div class="container">
        <div class="row justify-content-center align-items-center ">
            <div class="col-sm-6 align-self-center auth-wrapper">
                <div class="auth-intro">
                    <h2 class="auth-title"> Edit Course Information </h2>
                </div>

                <form id="courseForm" method="post" action="\app\Controllers\updateCourse.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="name" placeholder="Edit Your Name" name="name" class="form-control" value="<?php echo $course->getName(); ?>" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">ID</label>
                        <input id="id" type="name" placeholder="Course ID" name="id" class="form-control" value="<?php echo $course->getId(); ?>" required readonly/>
                    </div>
                    <div class="form-group">
                        <label for="trackName">Track Name:</label>
                        <select name='track_id' class="form-control" value>
                            <option value="<?php echo $course->getTrackId() ?>"><?php echo ($trackRepo->getById($course->getTrackId()))->getName() ?></option>
                            <?php foreach ($tracks as $track): ?>
                                <option value="<?php echo $track->getId() ?>""><?php echo $track->getName() ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-edit"></i>
                        <label for="description">Description</label>
                        <textarea id="description" placeholder="Add info..." name="description"  class="form-control" required><?php echo $course->getDescription(); ?></textarea>
                    </div>

                    <div class="text-center submit-btn">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>

            </div>
        </div>
    </div>
    <?php } ?>

    <?php if($flag != 0){ ?>
        <div class="container">
            <div class="row justify-content-center align-items-center ">
                <div class="col-sm-6 align-self-center auth-wrapper">
                    <div class="auth-intro">
                        <h2 class="auth-title"> Edit Course Information </h2>
                    </div>

                    <form id="courseForm" method="post" action="\app\Controllers\updateCourse.php">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="name" placeholder="Edit Your Name" name="name" class="form-control" value="<?php echo $data['name']; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="name">ID</label>
                            <input id="id" type="name" placeholder="Course ID" name="id" class="form-control" value="<?php echo $data['id']; ?>" required readonly/>
                        </div>
                        <div class="form-group">
                            <label for="trackName">Track Name:</label>
                            <select name='track_id' class="form-control" value>
                                <?php $trackObj = $trackRepo->getById($data['track_id']);?>
                                <option value="<?php echo $data['track_id'] ?>"><?php echo $trackObj->getName() ?></option>
                                <?php foreach ($tracks as $track): ?>
                                    <option value="<?php echo $track->getId() ?>""><?php echo $track->getName() ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-edit"></i>
                            <label for="description">Description</label>
                            <textarea id="description" placeholder="Add info..." name="description"  class="form-control" required><?php echo $data['description']; ?></textarea>
                        </div>

                        <div class="text-center submit-btn">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>

                </div>
            </div>
        </div>
    <?php } ?>
</div>


<?php
require_once(__DIR__.'/layout/footer.php');
?>