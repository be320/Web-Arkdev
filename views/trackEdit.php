<?php
require_once(__DIR__.'/../app/includes/sessionStart.php');
require_once(__DIR__.'/../app/includes/sessionAuth.php');

$data = $_GET;
require_once(__DIR__ . '/../app/Repository/TrackRepository.php');
$trackRepo = new TrackRepository();
$track = $trackRepo->getById($data['id']);
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
    <div class="container">
        <div class="row justify-content-center align-items-center ">
            <div class="col-sm-6 align-self-center auth-wrapper">
                <div class="auth-intro">
                    <h2 class="auth-title"> Edit Tracks Information </h2>
                </div>
                <form id="Track_Form" method="post" action="/app/Controllers/updateTrack.php">
                    <div class="form-group">
                       
                        <input type="hidden" name="id" value="<?php echo $track->getId() ?>"> 
                        <label for="name">Name</label>
                        <input id="name" type="name" placeholder="Edit Track's Name" name="name" class="form-control" required value="<?php echo $track->getName() ;?>"/>

                    </div>
                    <div class="text-center submit-btn">
                        <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
                    </div>
                
            </div>
        </div>
    </div>
</div>
<?php
require_once(__DIR__.'/layout/footer.php');
?>