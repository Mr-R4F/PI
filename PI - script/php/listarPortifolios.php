<?php

require_once '../config/conexao.php';

$nomeUsuario = $_SESSION['nm'];

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
    "SELECT projeto_LL.nomeProjeto, projeto_LL.dataPostagem, projeto_LL.imagens, projeto_LL.IdProjeto, projeto_LL.ativo, categoria_LL.nomeCategoria FROM projeto_LL
    INNER JOIN categoria_LL ON categoria_LL.IdCategoria = projeto_LL.IdCategoria
    INNER JOIN usuario_LL ON usuario_LL.IdUsuario = projeto_LL.IdUsuario
    WHERE usuario_LL.nomeUsuario = '$nomeUsuario'
");
$stmt -> execute();