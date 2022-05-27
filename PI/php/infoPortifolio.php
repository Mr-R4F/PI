<?php

require_once '../config/conexao.php';

if (isset($_GET['id'])) {
    $stmt = $bd -> query(
        "SELECT nomeProjeto, imagens, nomeUsuario, IdProjeto FROM projeto 
        INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
        WHERE projeto.IdProjeto = {$_GET['id']}");
    $stmt -> execute();
    
    while ($val = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        ?> 
            <p><?php echo $val['nomeProjeto']?></p>
            <img src="<?php echo $val['imagens']; ?>" alt="N/D" width="410px" height="250px" class="bg-secondary">
            <p><?php echo $val['nomeUsuario']?></p>
        <?php
    }
}