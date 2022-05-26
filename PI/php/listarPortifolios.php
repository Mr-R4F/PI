<?php

require_once '../config/conexao.php';

$nomeUsuario = $_SESSION['nm'];
$conteudo = 1;

$stmt = $bd -> query(
    "SELECT projeto.nomeProjeto, projeto.dataPostagem, projeto.imagens, projeto.IdProjeto
    FROM projeto
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE usuario.nomeUsuario = '$nomeUsuario'
");
$stmt -> execute();