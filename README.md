# Course Registration and Management System
This is a web frontend and backend project for Registration and Management System for adding students, instructors, Courses, admins and tracks.

## Entities:
### Students 
will be able to to registers through a mobile application only.
add courses, drop Courses.
Search courses by specific track.

### Admins
Will intrface through web browsers only.
add cousrses, add amdmins, add instructors add tracks.
can delelte any of them.

## Installation
### 1 Setting the database 
Using the import function in PHP my admin 
import the sql file 
located in: BD folder
now the database is set 

an admin record is added already
```
name: admin
email: admin@arkdev.com
password: admin
```

### 2 Setting the config file to accsess you database server
```
Go to Config/app.php
```
change the ```$dbUserName``` and ```$dbPassword``` to match the phpmyadmin username and password you have 
