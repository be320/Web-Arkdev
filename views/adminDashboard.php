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
    <title>Workshop | Dashboard</title>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Simple App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/app/Controllers/createAdmin.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/app/Controllers/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<article class="main container">
<?php
    require_once(__DIR__.'/../app/Models/Admin.php');
    require_once(__DIR__.'/../app/includes/sessionStart.php');
    if(isset($_SESSION['admin'])){
        $admin = $_SESSION['admin'];
        echo '<h2>Welcome back '.$admin->getname().'</h2>';
    }else{
        echo '<h2>please login to access home</h2>';  
    }
?>
    <section>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($admins as $admin) {
                echo '<tr>';
                echo '<th scope="row">' . $admin->getId() . '</th>';
                echo '<td>' . $admin->getName() . '</td>';
                echo '<td>' . $admin->getEmail() . '</td>';

                echo '<td>';
                echo '<a class="btn btn-primary" href="/views/adminEdit.php?id=' . $admin->getId() . '">Edit</a>';
                echo '<a class="btn btn-danger m-lg-1" href="/../app/Controllers/deleteAdmin.php?id=' . $admin->getId() . '">Delete</a>';
                echo '</td>';

                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </section>
</article>
</body>
</html>
