<?php

/* Arrumar depois */

require_once '../config/conexao.php';
$order = 'ORDER BY nomeProjeto';

    switch ($_GET['ordem']) {
        case 'AZ':
            $order = 'ORDER BY nomeProjeto';
            break;
            
         case 'ZA':
            $order = 'ORDER BY nomeProjeto DESC';
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
