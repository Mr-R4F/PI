<?php

session_start();

include '../php/addProjeto.php';

$id = $_SESSION['id'];
$nome = $_POST['nome'];
$data = $_POST['data'];
$desc = $_POST['desc'];