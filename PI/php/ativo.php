<?php

require_once '../config/conexao.php';

$stmt = $bd -> query(
    "SELECT nomeProjeto, imagens, nomeUsuario, IdProjeto FROM projeto_LL
    INNER JOIN usuario_LL ON usuario_LL.IdUsuario = projeto_LL.IdUsuario
    WHERE projeto_LL.ativo = 'S'
");
$stmt -> execute();