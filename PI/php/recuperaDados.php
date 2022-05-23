<?php

require_once '../config/conexao.php';

$nome = $_SESSION['nm'];

$stmt = $bd -> query(
    "SELECT IdProjeto FROM projeto 
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE nomeUsuario = '$nome'"
);
$stmt -> execute();
$val = $stmt -> fetchAll(PDO::FETCH_COLUMN);