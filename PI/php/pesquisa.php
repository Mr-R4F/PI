<?php

require_once '../config/conexao.php';

if (isset($_GET['pesquisa'])) {
    $pesquisa = htmlspecialchars($_GET['pesquisa']); #Converte caracteres especiais.

    #Retorna o nº de linhas.
    $stmt = $bd -> query(
        "SELECT COUNT(projeto_LL.nomeProjeto) AS lin
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