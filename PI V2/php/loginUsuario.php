<?php

session_start();
require_once '../config/conexao.php';

$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

$stmt = $bd -> prepare('SELECT nomeUsuario, IdUsuario, email, senha FROM usuario_UU WHERE email = :email');
$stmt -> bindParam(':email', $email);
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

if(password_verify($senha, $val['senha']) && isset($val['email'])) {
    $_SESSION['nm'] = $val['nomeUsuario'];
    $_SESSION['id'] = $val['IdUsuario'];
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