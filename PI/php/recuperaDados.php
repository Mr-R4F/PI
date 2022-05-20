<?php

require_once '../config/conexao.php';

$nome = $_SESSION['id'];

$stmt = $bd -> query("SELECT IdProjeto FROM projeto WHERE IdProjeto = '1' ");
$stmt -> execute();
$val = $stmt -> fetchAll(PDO::FETCH_COLUMN);

foreach ($val as $vals) {
    $stmt = $bd -> query(
        "SELECT usuario.nomeUsuario, projeto.nomeProjeto, projeto.dataPostagem, 
        projeto.ativo, projeto.imagens, projeto.descricao, projeto.IdProjeto
        FROM usuario, projeto WHERE usuario.nomeUsuario = '$nome' AND IdProjeto = '{$vals}'
    ");

    $stmt -> execute();
    $val = $stmt -> fetch(PDO::FETCH_ASSOC);
        echo '<pre>';
    var_dump($val);
    echo '</pre>';
}