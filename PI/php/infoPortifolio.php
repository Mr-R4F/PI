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
                    <p class="display-6 text-muted"><?php echo ucfirst($val['nomeProjeto'])?></p>
                </div>
            </div>
            <div class="card shadow mt-3">
                <img src="<?php echo $val['imagens']; ?>" alt="N/D" height="700px" class="img-card shadow bg-secondary">
            </div>
            <div class="card shadow mt-3">
                <div class="card-body d-flex justify-content-between">
                    <p class="mt-2 display-6">Por: <?php echo $val['nomeUsuario']?></p>
                    <p class="mt-2 display-6">Postado em: <?php echo $val['dataPostagem']?></p>
                </div>
            </div>
            <div class="row gx-2">
                <div class="col">
                    <div class="card mt-3">
                        <div class="card-body shadow">
                            <p>Descrição:</p>
                            <p class="text-center"><?php echo $val['descricao']?></p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card mt-3">
                        <div class="card-body shadow">
                        <p class="mb-2">Ferramentas</p>
                            <p class="text-center bg-secondary rounded-3 px-2 py-2">Illustrator</p>
                            <p class="text-center bg-secondary rounded-3 px-2 py-2">PhotoShop</p>
                            <p class="text-center bg-secondary rounded-3 px-2 py-2">Paint</p>
                            <p class="text-center bg-secondary rounded-3 px-2 py-2">Figma</p>
                        </div>
                    </div>
                </div> 
            </div>
        <?php
    }
}