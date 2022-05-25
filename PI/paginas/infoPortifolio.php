<?php

require_once '../config/conexao.php';

$stmt = $bd -> query(
    "SELECT nomeProjeto, imagens, nomeUsuario, IdProjeto FROM projeto 
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE projeto.IdProjeto = {$_GET['id']}");
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

echo $val['nomeProjeto'];
echo $val['imagens'];
echo $val['nomeUsuario'];
echo $val['IdProjeto'];