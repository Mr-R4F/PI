<?php

require_once '../config/conexao.php';

$pag = isset($_GET['pag']) ? $_GET['pag'] : 1; //garante a página que o usuário quer navegar
$qtdPagina = 12;

$stmt = $bd -> query("SELECT COUNT(*) AS qtd FROM projeto_LL 
INNER JOIN usuario_LL ON usuario_LL.IdUsuario = projeto_LL.IdUsuario
WHERE projeto_LL.ativo = 'S'");
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

$condicoes = [strlen($pesquisa) ? "nomeProjeto LIKE '%".str_replace(' ', '%',$pesquisa)."%'" : null, "projeto_LL.ativo = 'S'"]; 
$condicoes = array_filter($condicoes);

$where = empty($condicoes) ? '': 'WHERE '. implode(' AND ', $condicoes); 

#Paginação
$stmt = $bd -> query(
    "SELECT nomeProjeto, imagens, nomeUsuario, IdProjeto FROM projeto_LL 
    INNER JOIN usuario_LL ON usuario_LL.IdUsuario = projeto_LL.IdUsuario
    $where $order OFFSET $offset ROWS FETCH NEXT $qtdPagina ROWS ONLY");
$stmt -> execute();