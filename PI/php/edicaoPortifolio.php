<?php

require_once '../config/conexao.php';

$stmt = $bd -> query(
    "SELECT projeto.nomeProjeto, projeto.imagens, projeto.dataPostagem, projeto.descricao, projeto.ativo FROM projeto 
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE IdProjeto = {$_GET['id']} AND nomeUsuario = '{$_SESSION['nm']}'"
);
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($val['ativo'] == 'S') {
    $ativoS = "<input class='form-check-input' type='radio' name='ativo' id='s' value='S' checked>";
    $ativoN = "<input class='form-check-input' type='radio' name='ativo' id='n' value='N'>";
} else {
    $ativoS = "<input class='form-check-input' type='radio' name='ativo' id='s' value='S'>";
    $ativoN = "<input class='form-check-input' type='radio' name='ativo' id='n' value='N' checked>";
}