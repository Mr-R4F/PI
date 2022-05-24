<?php

require_once '../config/conexao.php';

$nome = $_SESSION['nm'];

$stmt = $bd -> query(
    "SELECT projeto.nomeProjeto, projeto.dataPostagem, projeto.imagens, projeto.IdProjeto
    FROM projeto
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE usuario.nomeUsuario = '$nome'
");
$stmt -> execute();