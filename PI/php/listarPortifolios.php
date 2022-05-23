<?php
/*
require_once '../config/conexao.php';

$nome = $_SESSION['id'];
/*
$stmt = $bd -> query("SELECT usuario.IdUsuario, projeto.IdProjeto, projeto.nomeProjeto FROM usuario, projeto");
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

$stmt = $bd -> query(
    "SELECT usuario.nomeUsuario, projeto.nomeProjeto, projeto.dataPostagem, projeto.imagens, projeto.IdProjeto
    FROM usuario, projeto WHERE usuario.nomeUsuario = '$nome' AND  projeto.IdProjeto = '1'
");
$stmt -> execute();

while ($val = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $img = 'N/D';
    if (!empty($val['imagens'])) { #verificar se existe imagem
        if(is_file($val['imagens'])) #verifica se o arquivo existe
            $img = "<img src='{$val['imagens']}' alt='' width='100%' height='210'>";
    }

    foreach ($val as $vals => $i) {
        $gerar = "
        <div class='card shadow-sm d-flex flex-wrap justify-content-center justify-content-lg-start'>
            <div class='row align-items-center'>
                <div class='col-4'>
                <?php echo {$img} ?>
                </div>
                <div class='col-6 mx-auto'>
                    <p class='card-text px-2'><?php echo {$val['nomeUsuario']};?></p>
                    <p class='card-text px-2'><?php echo {$_SESSION['id']};?></p>
                    <p class='card-text px-2'><?php echo {$val['dataPostagem']};?></p>
                    <p class='card-text px-2'><?php echo {$val['IdProjeto']};?></p>
                </div>
            </div>
        </div>
    ";
    }
 
    echo '<pre>';
    var_dump($gerar);
    echo '</pre>';
}
*/
