<body>
<header>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark indigo">
        <a href="/views/index.php" class="navbar-brand" style="color: #a2a2a2"><strong>Welcome</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admins
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="createAdmin.php">Create</a>
                        <a class="dropdown-item" href="adminDashboard.php">Dashboard</a>
                    </div>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Instructors
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="createInstructor.php">Create</a>
                        <a class="dropdown-item" href="instructorDashboard.php">Dashboard</a>
                    </div>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Students
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="createStudent.php">Create</a>
                        <a class="dropdown-item" href="studentDashboard.php">Dashboard</a>
                    </div>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Courses
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="createCourse.php">Create</a>
                        <a class="dropdown-item" href="courseDashboard.php">Dashboard</a>
                    </div>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tracks
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="createTrack.php">Create</a>
                        <a class="dropdown-item" href="trackDashboard.php">Dashboard</a>

                    </div>

                <li class="nav-item dropdown">
                    <a role="button" href="teach.php" class="navbar" style="color: #a2a2a2">Teach</a>


            </ul>
			<ul class="nav navbar-nav navbar-right">
      <li><a href="/app/Controllers/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
        </div>
    </nav>
</header>
