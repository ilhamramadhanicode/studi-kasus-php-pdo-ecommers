<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
} else {
    header("Location: beranda.php");
    exit();
}
