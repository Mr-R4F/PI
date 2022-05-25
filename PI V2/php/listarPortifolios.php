<?php

require_once '../config/conexao.php';

$nome = $_SESSION['nm'];

$stmt = $bd -> query(
    "SELECT projeto_PP.nomeProjeto, projeto_PP.dataPostagem, projeto_PP.imagens, projeto_PP.IdProjeto
    FROM projeto_PP
    INNER JOIN usuario_UU ON usuario_UU.IdUsuario = projeto_PP.IdUsuario
    WHERE usuario_UU.nomeUsuario = '$nome'
");
$stmt -> execute();