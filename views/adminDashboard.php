<?php
require_once(__DIR__ . '/../app/Repository/AdminRepository.php');
require_once(__DIR__.'/../app/includes/sessionStart.php');
require_once(__DIR__.'/../app/includes/sessionAuth.php');
require_once(__DIR__ . '/../app/Models/Admin.php');

//collect search
if(isset($_POST['filter'])){
  $name = $_POST['search'];
  $adminRepo = new AdminRepository();
  $admins = $adminRepo->getByName($name);
  unset($_POST); 
}else {    
    $adminRepo = new AdminRepository();
    $admins = $adminRepo->getAll(); 
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

    <title>Admin | Dashboard</title>
</head>

<?php
require_once(__DIR__.'/layout/header.php');
?>
<!------------------------------------------------------------------------------------------------------------------->
<div class="main">
    <div class="main-img">
        <img src="../images/books.jpg" class="banner" alt="banner"/>
    </div>
	<div id="navbar">
    <form action="adminDashboard.php" method="post">
      <ul>
		    <li><input style="border:2px solid black" type="text" name="search" placeholder="Name..." class="form-control"></li>
		    <li><input style="width:70px; text-align:left;" class="form-control" type="submit" value="Filter" name="filter"></li>
		  </ul>
	  </div>
	  </div>
<article class="container-fluid">
    <section>
	<div>
	<table class="table table-striped">
		<thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col" colspan="2">Actions</th>
            </tr>
		</thead>
		<tbody> 
      <?php
      function makeSure($admin):string
      {
        require_once(__DIR__.'/../app/Models/Admin.php');
        require_once(__DIR__.'/../app/includes/sessionStart.php');
        if(isset($_SESSION['admin'])){
          $x = $_SESSION['admin'];
          $id=$x->getid();
        }
        
        if($admin->getId()===$id){
          return ' disabled ';
        }
        return '';
      }
      try{
        foreach ($admins as $admin){
          echo('<tr>');
          echo('<th>'.$admin->getId() .'</td>');
          echo('<td>'.$admin->getName().'</td>'); 
          echo('<td>' . $admin->getEmail() . '</td>'); 
          echo('<td><a href="/views/adminEdit.php?id=' . $admin->getId() . '"><button type="button" class="btn btn-primary">Edit</button></a></td>'); 
          echo('<td><a href="/../app/Controllers/deleteAdmin.php?id=' . $admin->getId() . '"><button '.makeSure($admin).'type="button" class="btn btn-danger">Delete</button></a></td>');   
          echo('</tr>');
        }
      }catch(Exception $e){
        echo($e->error_log);
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