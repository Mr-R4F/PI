<?php

session_start();
require_once '../config/conexao.php';

$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

$stmt = $bd -> prepare('SELECT nomeUsuario, IdUsuario, email, senha FROM usuario WHERE email = :email');
$stmt -> bindParam(':email', $email);
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

if (password_verify($senha, $val['senha']) && isset($val['email'])) {
    $_SESSION['nm'] = $val['nomeUsuario'];
    $_SESSION['id'] = $val['IdUsuario'];
    ?> 
        <p class="fs-4 fw-bolder">Logado!</p>
            <script>
            setTimeout(() => {
                location.href = '/PI/paginas/index.php';
            }, 1000);
        </script>
    <?php
} else {
    ?>
        <p class="fs-4 fw-bolder">Usuário / senha incorretos</p>
    <?php
}