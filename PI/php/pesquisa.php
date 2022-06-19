<?php

require_once '../config/conexao.php';

#pesquisa em outras páginas e index inclusive (barra de pesquisa no header)
if (isset($_GET['pesquisa'])) {
    $pesquisa = htmlentities($_GET['pesquisa']);
    
    $stmt = $bd -> query("EXEC pesquisa @pesquisa = '$pesquisa'");
    $stmt -> execute();
    $totalLin = $stmt -> fetch(PDO::FETCH_ASSOC);

    $stmt = $bd -> query(
        "SELECT projeto.nomeProjeto, projeto.imagens, projeto.IdUsuario, projeto.IdProjeto, usuario.nomeUsuario
        FROM projeto
        INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
        WHERE nomeProjeto LIKE '%$pesquisa%' AND projeto.ativo = 'S'");
    $stmt -> execute();
}