<?php

require_once '../config/conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confimaSenha = $_POST['confirmaSenha'];

if ($senha === $confimaSenha) {
    $stmt = $bd -> query("SELECT email FROM usuario WHERE email = '$email'" );
    $stmt -> execute([$email]);
    $user = $stmt -> fetchAll();

    if ($user) { #se encontrar
        ?>
            <p class="fs-4 fw-bolder">O email informado já existe</p>
        <?php
    } else {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $bd -> prepare("INSERT INTO usuario_LL (nomeUsuario, email, senha, ativo) VALUES (:nomeUsuario, :email, :senha, 'S')");
        $stmt -> bindParam(':nomeUsuario', $nome);
        $stmt -> bindParam(':email', $email);
        $stmt -> bindParam(':senha', $senha);
    
        if ($stmt -> execute()) {
            ?>
                <p class="fs-4 fw-bolder">Cadastrado com sucesso</p>
                <script>
                    setTimeout(() => {
                        location.href = '/PI/paginas/login.php';
                    }, 1700);
                </script>
            <?php
        } else {
            ?>
                <script>
                    setTimeout(() => {
                        location.href = '/PI/paginas/cadastro.php';
                    }, 1500);
                </script>
            <?php
        }
    }
} else {
    ?> 
        <p class="fs-4 fw-bolder">As senhas não correspondem</p>
    <?php
}
