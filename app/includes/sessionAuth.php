<?php

if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
    header('Location: /login.php');
    exit();
}