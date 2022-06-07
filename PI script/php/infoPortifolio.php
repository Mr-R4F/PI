<?php

require_once '../config/conexao.php';

if (isset($_GET['id'])) {
    $stmt = $bd -> query(
        "SELECT nomeProjeto, imagens, nomeUsuario, IdProjeto, descricao, dataPostagem FROM projeto_LL 
        INNER JOIN usuario_LL ON usuario_LL.IdUsuario = projeto_LL.IdUsuario
        WHERE projeto_LL.IdProjeto = {$_GET['id']}");
    $stmt -> execute();
    
    while ($val = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        ?> 
            <div class="card shadow">
                <div class="card-body text-center pt-0 pb-0">
                    <p class="fs-1 fw-normal text-muted"><?php echo ucfirst($val['nomeProjeto'])?></p>
                </div>
            </div>
            <div class="card shadow mt-3">
                <img src="<?php echo $val['imagens']; ?>" alt="N/D" height="700px" class="card-img shadow bg-secondary">
            </div>
            <div class="card shadow mt-3">
                <div class="card-body d-flex justify-content-between">
                    <p class="fs-5 mt-2">Por: <?php echo ucfirst($val['nomeUsuario'])?></p>
                    <p class="fs-5 mt-2">Postado em: <?php $data = new DateTime($val['dataPostagem']); echo $data->format('d-m-Y');?></p>
                </div>
            </div>
            <div class="row gx-2">
                <div class="col-12">
                    <div class="card shadow mt-3">
                        <div class="card-body">
                            <p>Descrição:</p>
                            <p class="text-center"><?php echo $val['descricao'];?></p>
                        </div>
                    </div>
                </div>
            </div> 
        <?php
    }
}