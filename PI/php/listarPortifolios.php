<?php

require_once '../config/conexao.php';

$nomeUsuario = $_SESSION['nm'];


if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];

    #Retorna o nº de linhas.
    $stmt = $bd -> query(
        "SELECT COUNT(projeto.nomeProjeto) AS lin
        FROM projeto  
        INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
        WHERE nomeProjeto LIKE '%$pesquisa%'
    ");
    $stmt -> execute();
    $lin = $stmt -> fetch(PDO::FETCH_ASSOC);

    #Retorna o as respectivas consultas.
    $stmt = $bd -> prepare(
        "SELECT projeto.nomeProjeto, projeto.imagens, projeto.IdUsuario, projeto.IdProjeto, usuario.nomeUsuario
        FROM projeto
        INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
        WHERE nomeProjeto LIKE '%$pesquisa%' AND projeto.ativo = 'S'");
    $stmt -> execute();
}

#Retorna o número de linhas
$stmt = $bd -> query(
    "SELECT COUNT(projeto.IdProjeto) AS lin FROM projeto      
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE usuario.nomeUsuario = '$nomeUsuario'
");
$stmt -> execute();
$lin = $stmt -> fetch(PDO::FETCH_ASSOC);

#Retorna as respectivas consultas abaixo.
$stmt = $bd -> query(
    "SELECT projeto.nomeProjeto, projeto.dataPostagem, projeto.imagens, projeto.IdProjeto
    FROM projeto
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE usuario.nomeUsuario = '$nomeUsuario'
");
$stmt -> execute();