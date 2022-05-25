<?php

require_once '../config/conexao.php';

$stmt = $bd -> query(
    "SELECT projeto_PP.nomeProjeto, projeto_PP.imagens, projeto_PP.dataPostagem, projeto_PP.descricao, projeto_PP.ativo FROM projeto_PP
    INNER JOIN usuario_UU ON usuario_UU.IdUsuario = projeto_PP.IdUsuario
    WHERE IdProjeto = {$_GET['id']} AND nomeUsuario = '{$_SESSION['nm']}'"
);
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($val['ativo'] == 'S') {
    $ativoS = "<input class='form-check-input' type='radio' name='ativo' id='s' value='S' checked>";
    $ativoN = "<input class='form-check-input' type='radio' name='ativo' id='n' value='N'>";
}
else {
    $ativoS = "<input class='form-check-input' type='radio' name='ativo' id='s' value='S'>";
    $ativoN = "<input class='form-check-input' type='radio' name='ativo' id='n' value='N' checked>";
}