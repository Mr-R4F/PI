<?php

require_once '../config/conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confimaSenha = $_POST['confirmaSenha'];

if ($senha === $confimaSenha) {
    $stmt = $bd -> query("SELECT email FROM usuario_UU WHERE email = '$email'" );
    $stmt -> execute([$email]);
    $user = $stmt -> fetchAll();
    
    if ($user) {
        ?>
            <script>
                alert('Email já existe');
                history.back();
            </script>
        <?php
    }
    else {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $bd -> prepare('INSERT INTO usuario_UU (nomeUsuario, email, senha) VALUES (:nomeUsuario, :email, :senha)');

        $stmt -> bindParam(':nomeUsuario', $nome);
        $stmt -> bindParam(':email', $email);
        $stmt -> bindParam(':senha', $senha);
    
        if ($stmt -> execute()) {
            ?> 
                <script>
                    alert('Usuário cadastrado com sucesso!');
                    location.href = '/PI/paginas/login.php';
                </script> 
                
            <?php
        }
        else {
            ?>
                <script>
                    alert('Erro ao gravar');
                    history.back();
                </script> 
            <?php
        }
    }
}
else {
    ?> 
        <script>
            alert('Senhas não batem');
            history.back();
        </script>
    <?php
}