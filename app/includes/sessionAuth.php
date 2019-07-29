<?php

if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
    header('Location: /views/index_mm.html');
    exit();
}
