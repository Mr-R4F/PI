<?php

session_start();
require_once '../config/conexao.php';

$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

$stmt = $bd -> prepare('SELECT nomeUsuario, email, senha, IdUsuario FROM usuario_LL WHERE email = :email');
$stmt -> bindParam(':email', $email);
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

if(password_verify($senha, $val['senha']) && isset($val['email'])) {
    $_SESSION['id'] = $val['nomeUsuario'];
    header('location: ../paginas/index.php');
} 

else {
    ?> 
        <script>
            alert('Usuário/Senha incorretos');
            location.href = '/PI/paginas/login.php';
        </script>
    <?php
}