<?php

session_start();
require_once '../config/conexao.php';

$nomeUsuario = $_SESSION['nm'];
$codigo = $_POST['cod'];
$_SESSION['codigo'] = $_POST['cod'];

$stmt = $bd -> query(
    "SELECT projeto.nomeProjeto, projeto.imagens, projeto.dataPostagem, projeto.descricao, projeto.ativo FROM projeto 
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE IdProjeto = $codigo AND nomeUsuario = '$nomeUsuario'"
);
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($val) {
    $img = 'N/D';
    if (!empty($val['imagens'])) { #verificar se existe imagem
            if(is_file($val['imagens'])) #verifica se o arquivo existe
                $img = $val['imagens'];
    }

    if ($val['ativo'] == 'S') {
        $_SESSION['inputSim'] = "<input class='form-check-input' type='radio' name='ativo' id='s' value='S' checked>";
        $_SESSION['inputNao'] = "<input class='form-check-input' type='radio' name='ativo' id='n' value='N'>";
    }
    elseif ($val['ativo'] == 'N') {
        $_SESSION['inputSim'] = "<input class='form-check-input' type='radio' name='ativo' id='s' value='S'>";
        $_SESSION['inputNao'] = "<input class='form-check-input' type='radio' name='ativo' id='n' value='N' checked>";
    }

    ?> 
        <script>
            location.href = '/PI/paginas/configuracoesER.php';
        </script>
    <?php
}