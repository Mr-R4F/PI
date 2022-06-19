<?php

require_once '../config/conexao.php';

$pag = isset($_GET['pag']) ? $_GET['pag'] : 1; #garante a página que o usuário quer navegar
$qtdPagina = 12; 
$valInicial = 1; 

$categoria = $pesquisa = $LIKE = $AND = $INNER = ''; #**INNER Fica vazio se o categoria não estiver definido
$val = 'nomeProjeto'; #padrão ao entrar na plataforma

$stmt = $bd -> query('EXEC numLin'); #retorna o nº de linhas
$stmt -> execute();
$totalLin = $stmt -> fetch(PDO::FETCH_ASSOC);

$numPag = ceil($totalLin['qtd'] / $qtdPagina); #Arredanda os valores
$offset =  ($qtdPagina * $pag) - $qtdPagina; #deslocamento de página

if (isset($_GET['ordem'])) {
    switch ($_GET['ordem']) {
        case 'AZ':
            $val = 'nomeProjeto';
            break;
                
        case 'ZA':
            $val = 'nomeProjeto DESC';
            break;

        case 'autor':
            $val = 'nomeUsuario';
            break;

        case 'recentes':
            $val = 'dataPostagem';
            break;

        default:
            break;
    }
}

if (isset($_GET['categoria'])) {
    $INNER = 'INNER JOIN categoria ON categoria.IdCategoria = projeto.IdCategoria';
    $AND = "AND categoria.nomeCategoria = ";
    $val = 'imagens';

    switch ($_GET['categoria']) {
        case 'imagem':
            $categoria = "'imagem'";
            break;
            
        case 'prototipos':
            $categoria = "'prototipos'";
            break;
    
        case 'projetos':
            $categoria = "'projetos'";
            break;
    
        default:
            break;
    }
}

#pesquisa na index SOMENTE (barra de pesquisa na main)
if (isset($_GET['pesquisa'])) {
    $pesquisa = htmlentities($_GET['pesquisa']);
    $AND = "AND nomeProjeto ";
    $LIKE = "LIKE '%$pesquisa%'";

    $stmt = $bd -> query("EXEC pesquisa @pesquisa = '$pesquisa'");
    $stmt -> execute();
    $totalLin = $stmt -> fetch(PDO::FETCH_ASSOC);
}

#Páginação
$stmt = $bd -> prepare(
    "WITH pag AS (
        SELECT ROW_NUMBER() OVER(ORDER BY $val) AS lin, nomeProjeto, IdProjeto, imagens, nomeUsuario FROM projeto
        $INNER
        INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
        WHERE projeto.ativo = 'S' $AND $categoria $LIKE
    ) 
    SELECT * FROM pag WHERE lin BETWEEN (($valInicial * $offset) + 1) AND ($qtdPagina * $pag)"
);
$stmt -> execute();