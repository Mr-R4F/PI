<?php

require_once '../config/conexao.php';

$nomeUsuario = $_SESSION['nm'];

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
    "SELECT projeto.nomeProjeto, projeto.dataPostagem, projeto.imagens, projeto.IdProjeto, projeto.ativo, categoria.nomeCategoria FROM projeto
    INNER JOIN categoria ON categoria.IdCategoria = projeto.IdCategoria
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE usuario.nomeUsuario = '$nomeUsuario'
");
$stmt -> execute();