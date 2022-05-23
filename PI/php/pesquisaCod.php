<?php

session_start();
require_once '../config/conexao.php';

$_SESSION['codigo'] = $_POST['cod'];
$nomeUsuario = $_SESSION['nm'];
$codigo = $_SESSION['codigo'];

$stmt = $bd -> query(
    "SELECT nomeProjeto, imagens, dataPostagem FROM projeto 
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE IdProjeto = $codigo AND nomeUsuario = '$nomeUsuario'"
);
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($val) {
    $img = 'N/D';
    if (!empty($val['imagens'])) { #verificar se existe imagem
        if(is_file($val['imagens'])) #verifica se o arquivo existe
            $img = "<img src='{$val['imagens']}' alt='' width='100%' height='210'>";
    }

    $stmt = $bd -> query(
        "SELECT nomeProjeto, imagens, dataPostagem FROM projeto WHERE IdProjeto = $codigo;
    ");
    $stmt -> execute();
    $val = $stmt -> fetch(PDO::FETCH_ASSOC);

    ?> 
        <script>
            location.href = '/PI/paginas/configuracoesER.php';
        </script>
    <?php
}