<?php

session_start();

if (isset($_SESSION['id'])) {
    header('location: ../paginas/index.php');
    exit();
}