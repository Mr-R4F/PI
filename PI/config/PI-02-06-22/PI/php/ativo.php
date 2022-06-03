<?php

require_once '../config/conexao.php';

$stmt = $bd -> query(
    "SELECT nomeProjeto, imagens, nomeUsuario, IdProjeto FROM projeto 
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE projeto.ativo = 'S'
");
$stmt -> execute();