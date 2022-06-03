<?php

require_once '../config/conexao.php';

$stmt = $bd -> query(
    "SELECT projeto.nomeProjeto, projeto.imagens, projeto.dataPostagem, projeto.descricao, projeto.ativo, projeto.IdCategoria FROM projeto 
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE IdProjeto = {$_GET['id']} AND nomeUsuario = '{$_SESSION['nm']}'"
);
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($val['ativo'] == 'S') {
    $ativoS = "<input class='form-check-input shadow-sm' type='radio' name='ativo' id='s' value='S' checked>";
    $ativoN = "<input class='form-check-input shadow-sm' type='radio' name='ativo' id='n' value='N'>";
} else {
    $ativoS = "<input class='form-check-input shadow-sm' type='radio' name='ativo' id='s' value='S'>";
    $ativoN = "<input class='form-check-input shadow-sm' type='radio' name='ativo' id='n' value='N' checked>";
}

switch ($val['IdCategoria']) {
    case 1:
        $img = '<option value="1" selected>Imagens</option>';
        $prot = '<option value="2" selected>Protótipos</option>';
        $proj = '<option value="3" selected>Projetos</option>';
        break;

    case 2:
        $img = '<option value="1">Imagens</option>';
        $prot = '<option value="2" selected>Protótipos</option>';
        $proj = '<option value="3">Projetos</option>';
        break;
        
    case 3:
        $img = '<option value="1">Imagens</option>';
        $prot = '<option value="2">Protótipos</option>';
        $proj = '<option value="3" selected>Projetos</option>';
        break;
    
    default:
        break;
}