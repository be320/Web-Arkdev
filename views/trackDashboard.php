<?php
require_once(__DIR__ . '/../app/Repository/TrackRepository.php');
require_once(__DIR__.'/../app/includes/sessionStart.php');
require_once(__DIR__.'/../app/includes/sessionAuth.php');
$trackRepo = new TrackRepository();
$tracks = $trackRepo->getAll();
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
            <article class="container-fluid">
                <section>
                    <div id="1">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Track Name</th>
                                    <th colspan="2" scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody> 

                                <?php
                                foreach ($tracks as $track) {
                                    echo '<tr>';
                                    echo '<th scope="row">' . $track->getId() . '</th>';
                                    echo '<td>' . $track->getName() . '</td>';
                                    echo '<td>';
                                    echo '<a class="btn btn-primary" href="/views/trackEdit.php?id=' . $track->getId() . '">Edit</a>';
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