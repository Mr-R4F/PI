<?php

require_once '../config/conexao.php';

if (isset($_POST['id'])) {
    $email = $_POST['id'];
    $stmt = $bd -> query("SELECT email FROM usuario WHERE email = '$email'" );
    $stmt -> execute();

    while ($val = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        ?> 
            <p class="fs-6 text-center">Erro ao cadastrar</p>
        <?php
    }
}
