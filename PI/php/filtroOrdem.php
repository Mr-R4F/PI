<?php

require_once '../config/conexao.php';

$order = 'ORDER BY nomeProjeto';

switch ($_GET['ordem']) {
    case 'AZ':
        $order = 'ORDER BY nomeProjeto';
        break;
            
    case 'ZA':
        $order = 'ORDER BY nomeProjeto DESC';
        break;

    case 'autor':
            $order = 'ORDER BY nomeUsuario';
            break;

    case 'recentes':
        $order = 'ORDER BY dataPostagem';
        break;

    default:
        break;
}

$stmt = $bd -> query(
    "SELECT projeto.nomeProjeto, projeto.imagens, projeto.IdUsuario, projeto.IdProjeto, usuario.nomeUsuario
    FROM projeto 
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE projeto.ativo = 'S' $order
");
$stmt -> execute();