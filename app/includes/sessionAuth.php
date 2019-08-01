<?php

if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
    header('Location: /index.html');
    exit();
}
