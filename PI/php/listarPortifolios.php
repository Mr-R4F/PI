<?php

require_once '../config/conexao.php';

$nomeUsuario = $_SESSION['nm'];


if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];

    #Retorna o nº de linhas.
    $stmt = $bd -> query(
        "SELECT COUNT(projeto.nomeProjeto) AS lin
        FROM projeto_LL  
        INNER JOIN usuario_LL ON usuario_LL.IdUsuario = projeto_LL.IdUsuario
        WHERE nomeProjeto LIKE '%$pesquisa%'
    ");
    $stmt -> execute();
    $lin = $stmt -> fetch(PDO::FETCH_ASSOC);

    #Retorna o as respectivas consultas.
    $stmt = $bd -> prepare(
        "SELECT projeto_LL.nomeProjeto, projeto_LL.imagens, projeto_LL.IdUsuario, projeto_LL.IdProjeto, usuario_LL.nomeUsuario
        FROM projeto_LL
        INNER JOIN usuario_LL ON usuario_LL.IdUsuario = projeto_LL.IdUsuario
        WHERE nomeProjeto LIKE '%$pesquisa%' AND projeto_LL.ativo = 'S'");
    $stmt -> execute();
}

#Retorna o número de linhas
$stmt = $bd -> query(
    "SELECT COUNT(projeto_LL.IdProjeto) AS lin FROM projeto_LL      
    INNER JOIN usuario_LL ON usuario_LL.IdUsuario = projeto_LL.IdUsuario
    WHERE usuario_LL.nomeUsuario = '$nomeUsuario'
");
$stmt -> execute();
$lin = $stmt -> fetch(PDO::FETCH_ASSOC);

#Retorna as respectivas consultas abaixo.
$stmt = $bd -> query(
    "SELECT projeto_LL.nomeProjeto, projeto_LL.dataPostagem, projeto_LL.imagens, projeto_LL.IdProjeto
    FROM projeto_LL
    INNER JOIN usuario_LL ON usuario_LL.IdUsuario = projeto_LL.IdUsuario
    WHERE usuario_LL.nomeUsuario = '$nomeUsuario'
");
$stmt -> execute();