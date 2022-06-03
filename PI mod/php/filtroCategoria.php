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
    "SELECT nomeProjeto, nomeCategoria, imagens, nomeUsuario, IdProjeto FROM projeto_LL
    INNER JOIN categoria_LL ON categoria_LL.IdCategoria = projeto_LL.IdCategoria
    INNER JOIN usuario_LL ON usuario_LL.IdUsuario = projeto_LL.IdUsuario
    WHERE projeto_LL.ativo = 'S' AND categoria_LL.nomeCategoria = '$categoria'
");
$stmt -> execute();