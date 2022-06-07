<?php

require_once '../config/conexao.php';

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