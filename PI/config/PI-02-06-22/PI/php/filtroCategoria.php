<?php

require_once '../config/conexao.php';

$categoria = 'Imagem'; #padrão

switch ($_GET['categoria']) {
    case 'imagem':
        $categoria = 'Imagem';
        break;
        
    case 'prototipos':
        $categoria = 'Prototipos';
        break;

    case 'projetos':
        $categoria = 'Projetos';
        break;

    default:
        break;
}

$stmt = $bd -> query(
    "SELECT nomeProjeto, nomeCategoria, imagens, nomeUsuario, IdProjeto FROM projeto
    INNER JOIN categoria ON categoria.IdCategoria = projeto.IdCategoria
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    WHERE projeto.ativo = 'S' AND categoria.nomeCategoria = '$categoria'
");
$stmt -> execute();