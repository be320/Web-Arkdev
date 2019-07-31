<?php
require_once(__DIR__.'/getForTeach.php');
require_once(__DIR__.'/../app/includes/sessionStart.php');
require_once(__DIR__.'/../app/includes/sessionAuth.php');


$data = $_GET;
$flag = 0;
if(isset($data['error'])){
    if($data['error'] === 'courseAlreadyAssignedToInstructor') {
        $flag = 1;
    }elseif ($data['error'] === 'courseNotAlreadyAssignedToInstructor'){
        $flag = 2;
    }
    elseif ($data['error'] === 'chooseCourseName'){
        $flag = 3;
    }
    elseif ($data['error'] === 'chooseInstructorName'){
        $flag = 4;
    }
}elseif (isset($data['state'])){
 if($data['state'] === 'InstructorAssignedToCourse'){
    $flag = 5;
 }
 elseif ($data['state'] === 'InstructorUnAssignedFromCourse'){
     $flag = 6;
 }
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

    <title>Assign Course</title>
</head>

<?php
    require_once(__DIR__.'/layout/header.php');
  ?>
<!------------------------------------------------------------------------------------------------------------------->
<div class="main">
    <div class="main-img">
        <img style="height:190px"src="../images/books.jpg" class="banner" alt="banner"/>
    </div>
    <br><br><br><br>
    <?php
    if($flag === 1){
        echo '<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>WARNING!</strong> This Instructor is already assigned to this Course</div>';
    }
    elseif ($flag === 2){
        echo '<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>WARNING!</strong> This Instructor is not assigned to this Course</div>';
    }
    elseif ($flag === 3){
        echo '<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>WARNING!</strong> Please choose Course Name then try again</div>';
    }
    elseif ($flag === 4){
        echo '<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>WARNING!</strong> Please choose Instructor Name then try again</div>';
    }
    elseif ($flag === 5){
        echo '<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>CONGRATS!</strong> Instructor assigned to Course Successfully</div>';
    }
    elseif ($flag === 6){
        echo '<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>CONGRATS!</strong> Instructor unassigned from Course Successfully</div>';
    }
    ?>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-6 align-self-center auth-wrapper">
                <div class="auth-intro">
                    <h1 class="auth-title">Assign course to instructor</h1>
                    <form id="assignInstructor" method="post" action="/app/Controllers/teachAssign.php">
                        <select name="course_id" class="form-control">
                            <option disabled selected >Course Name</option>
                                <?php
                                foreach ($courses as $course){?>
                            <option value="<?php echo $course->getId(); ?>"> <?php echo $course->getName() ?></option>
                                <?php
                                }
                                ?>
                        </select>

                        <select name="instructor_id" class="form-control">
                            <option disabled selected >Instructor Name</option>
                            <?php
                            foreach ($instructors as $instructor){?>
                                <option value="<?php echo $instructor->getId(); ?>"> <?php echo $instructor->getName() ?></option>
                                <?php
                            }
                            ?>
                        </select>

                        <button type="submit" name="assign" id="btn_assign" class="form-control d-block w-100 btn btn-primary">Assign</button>
                    </form>

                        <hr>
                    <form id="UnAssignInstructor" method="post" action="/app/Controllers/teachUnassign.php">
                        <select name="course_id" class="form-control">
                            <option disabled selected >Course Name</option>
                            <?php
                            foreach ($courses as $course){?>
                                <option value="<?php echo $course->getId(); ?>"> <?php echo $course->getName() ?></option>
                                <?php
                            }
                            ?>
                        </select>

                        <select name="instructor_id" class="form-control">
                            <option disabled selected >Instructor Name</option>
                            <?php
                            foreach ($instructors as $instructor){?>
                                <option value="<?php echo $instructor->getId(); ?>"> <?php echo $instructor->getName() ?></option>
                                <?php
                            }
                            ?>
                        </select>

                        <button type="submit" name="unassign" id="btn_remove" class="form-control d-block w-100 btn btn-danger">Unassign</button>
                    </form>
                    <br>
                    <div class="text-center">
                        <a href="courseDashboard.php" target="_blank"><button class="btn btn-secondary mb-1">Course Dashboard</button></a>
                        <a href="instructorDashboard.php" target="_blank"><button class="btn btn-secondary mb-1">Instructor Dashboard</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
    require_once(__DIR__.'/layout/footer.php');
?>