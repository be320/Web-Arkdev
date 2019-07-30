<?php
require_once(__DIR__ . '/../includes/sessionStart.php');
session_destroy();
header('Location: /views/index_mm.html');
exit();