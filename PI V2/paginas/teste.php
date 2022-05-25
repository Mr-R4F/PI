<?php
require_once '../config/conexao.php';

$stmt = $bd -> query(
    "SELECT nomeProjeto, imagens, nomeUsuario, IdProjeto FROM projeto_PP 
    INNER JOIN usuario_UU ON usuario_UU.IdUsuario = projeto_PP.IdUsuario
    WHERE projeto_PP.IdProjeto = {$_GET['id']}");
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

echo $val['nomeProjeto'];
echo $val['imagens'];
echo $val['nomeUsuario'];
echo $val['IdProjeto'];