# Course Registration and Management System
This is a web frontend and backend project for Registration and Management System for adding students, instructors, Courses, admins and tracks.

# UPDATE 
Please update your database as there has been some small changes with the table IDs name
### Installation
download ```DB Update.sql``` file from DB folder <br />
Open up your phpmyadmin intrface <br />
select ```training_management_system``` database <br />
select ```import``` from the top bar <br />
choose the downloaded file <br />
now you're all set. <br />

## Entities:
### Students 
will be able to to registers through a mobile application only. <br />
add courses, drop Courses. <br />
Search courses by specific track. <br />

### Admins
Will intrface through web browsers only.
add cousrses, add admins, add instructors, add tracks. <br />
can delelte any of them. <br />

## Installation
### 1 Setting the database 
download the DB folder <br />
Using the import function in PHP my admin  <br />
import the ```training_managemet_system.sql``` file <br />
import ```DB Update.sql``` file ```don't have to do the update above if you done this ``` <br/>
now the database is set <br />

an admin record is added already <br />
```
name: admin
email: admin@arkdev.com
password: admin
```

### 2 Setting the config file to accsess you database server <br />
```
Go to Config/app.php
```
change the ```$dbUserName``` and ```$dbPassword``` to match the phpmyadmin username and password you have  <br />
