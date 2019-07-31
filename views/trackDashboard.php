<?php
require_once(__DIR__ . '/../app/Repository/TrackRepository.php');
require_once(__DIR__.'/../app/includes/sessionStart.php');
require_once(__DIR__.'/../app/includes/sessionAuth.php');
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

    <?php
        require_once(__DIR__.'/layout/header.php');
    ?>
        <!------------------------------------------------------------------------------------------------------------------->
        <div class="main">
            <div class="main-img">
                <img src="../images/books.jpg" class="banner" alt="banner"/>
            </div>
            <br><br><br><br>
	<div class="container">
        <div class="row justify- align-items-center ">
<div class="col-sm-12 align-self-center auth-wrapper" style="background-color: rgb(0,0,0,0);border: 0;box-shadow: 0 0 12px 3px black;">	  <form class="form-inline"style="align-items: center;justify-content: center;" >
        <input style="border:2px solid #6da17b" type="text" placeholder="Name">
		<input style="border:2px solid white; width:160px; background-color:#6da17b; color: white; text-align:center;" type="button" value="Search">
      </form>
	  </div>
	  </div>
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
                                    echo '<a class="btn btn-primary" href="/trackEdit.php?id=' . $track->getId() . '">Edit</a>';
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
        <?php
    require_once(__DIR__.'/layout/footer.php');
?>