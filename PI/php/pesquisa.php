<?php

require_once '../config/conexao.php';

if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];

    $stmt = $bd -> prepare(
        "SELECT projeto.nomeProjeto, projeto.imagens, projeto.IdUsuario, projeto.IdProjeto, usuario.nomeUsuario
        FROM projeto
        INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
        WHERE nomeProjeto LIKE '%$pesquisa%' AND projeto.ativo = 'S'");
    $stmt -> execute();
    
    if ($_GET['pesquisa'] == '') {
        header('location: ../paginas/index.php');
    }
}