<?php

require_once '../config/conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confimaSenha = $_POST['confirmaSenha'];

if ($senha === $confimaSenha) {
    $stmt = $bd -> query("SELECT email FROM usuario_LL WHERE email = '$email'" );
    $stmt -> execute([$email]);
    $user = $stmt -> fetchAll();
    
    if ($user) {
        header('location: ../paginas/cadastro.php');
    } else {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $bd -> prepare('INSERT INTO usuario_LL (nomeUsuario, email, senha) VALUES (:nomeUsuario, :email, :senha)');

        $stmt -> bindParam(':nomeUsuario', $nome);
        $stmt -> bindParam(':email', $email);
        $stmt -> bindParam(':senha', $senha);
    
        if ($stmt -> execute()) {
            header('location: ../paginas/login.php');
        } else {
            ?>
               <p class="fs-6 text-center">Erro ao cadastrar</p>
            <?php
        }
    }
} else {
    header('location: ../paginas/cadastro.php');
}