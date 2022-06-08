<?php

require_once '../config/conexao.php';

$categoria = 'Imagem'; #padrão

switch ($_GET['categoria']) {
    case 'imagem':
        $categoria = 'imagem';
        break;
        
    case 'prototipos':
        $categoria = 'prototipos';
        break;

    case 'projetos':
        $categoria = 'projetos';
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