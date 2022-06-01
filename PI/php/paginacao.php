<?php

require_once '../config/conexao.php';

$pag = isset($_GET['pag']) ? $_GET['pag'] : 1; //garante a página que o usuário quer navegar
$qtdPagina = 12;

#pesquisa
if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];

    #Retorna o nº de linhas.
    $stmt = $bd -> query(
        "SELECT COUNT(projeto.nomeProjeto) AS lin
        FROM projeto  
        INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
        WHERE nomeProjeto LIKE '%$pesquisa%'
    ");
    $stmt -> execute();
    $lin = $stmt -> fetch(PDO::FETCH_ASSOC);

    #Retorna o as respectivas consultas.
    $stmt = $bd -> prepare(
        "SELECT projeto.nomeProjeto, projeto.imagens, projeto.IdUsuario, projeto.IdProjeto, usuario.nomeUsuario
        FROM projeto
        INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
        WHERE nomeProjeto LIKE '%$pesquisa%' AND projeto.ativo = 'S'");
    $stmt -> execute();
}

$stmt = $bd -> query("SELECT COUNT(*) AS qtd FROM projeto 
INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
WHERE projeto.ativo = 'S'");
$stmt -> execute();
$totalLin = $stmt -> fetch(PDO::FETCH_ASSOC);

$numPag = ceil($totalLin['qtd'] / $qtdPagina);

$offset =  ($qtdPagina * $pag) - $qtdPagina; #deslocamento de página

#ordenação
$order = 'ORDER BY nomeProjeto';

if (isset($_GET['ordem'])) {
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
}

$pesquisa = isset($_GET['pesquisa']) ? htmlspecialchars($_GET['pesquisa'], ENT_COMPAT, 'UTF-8') : "";

$condicoes = [strlen($pesquisa) ? "nomeProjeto LIKE '%".str_replace(' ', '%',$pesquisa)."%'" : null, "projeto.ativo = 'S'"]; 
$condicoes = array_filter($condicoes);

$where = empty($condicoes) ? '': 'WHERE '. implode(' AND ', $condicoes); 

#Paginação
$stmt = $bd -> query(
    "SELECT nomeProjeto, imagens, nomeUsuario, IdProjeto 
    FROM projeto 
    INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
    $where $order OFFSET $offset ROWS FETCH NEXT $qtdPagina ROWS ONLY");
$stmt -> execute();