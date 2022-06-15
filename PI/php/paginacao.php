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

if (isset($_GET['pesquisa'])) {
    $pesquisa = htmlentities($_GET['pesquisa']);
    $AND = "AND projeto.nomeProjeto";
    $LIKE = "LIKE '%$pesquisa%'";
    
    $stmt = $bd -> query('EXEC numLin');
    $stmt -> execute();
    $Totallin = $stmt -> fetch(PDO::FETCH_ASSOC);
}

#Formas de paginação
#Primeira

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

/* Segunda forma de paginação
$condicoes = [strlen($pesquisa) ? "nomeProjeto LIKE '%" . str_replace(' ', '%',$pesquisa)."%'" : null, "projeto.ativo = 'S'"]; 
$condicoes = array_filter($condicoes);
$where = empty($condicoes) ? '': 'WHERE '. implode(' AND ', $condicoes); 

$stmt = $bd -> query(
    "SELECT nomeProjeto, imagens, nomeUsuario, IdProjeto FROM projeto 
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    $where $order OFFSET $offset ROWS FETCH NEXT $qtdPagina ROWS ONLY");
$stmt -> execute();
*/