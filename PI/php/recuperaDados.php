<?php

require_once '../config/conexao.php';

$nome = $_SESSION['id'];

$stmt = $bd -> query("SELECT IdProjeto FROM projeto_LL WHERE IdProjeto = '7'");
$stmt -> execute();
$val = $stmt -> fetchAll(PDO::FETCH_COLUMN);

foreach ($val as $vals) {
    $stmt = $bd -> query(
        "SELECT usuario_LL.nomeUsuario, projeto_LL.nomeProjeto, projeto_LL.dataPostagem, 
        projeto_LL.ativo, projeto_LL.imagens, projeto_LL.descricao, projeto_LL.IdProjeto
        FROM usuario_LL, projeto_LL WHERE usuario_LL.nomeUsuario = '$nome' AND IdProjeto = '{$vals}'
    ");

    $stmt -> execute();
    $val = $stmt -> fetch(PDO::FETCH_ASSOC);
        echo '<pre>';
    var_dump($val);
    echo '</pre>';
}