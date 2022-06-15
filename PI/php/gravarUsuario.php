<?php

require_once '../config/conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confimaSenha = $_POST['confirmaSenha'];

if((strlen($senha) && strlen($confimaSenha) >= 6) && (strlen($senha) && strlen($confimaSenha) <= 8)) { #verifica se a senha tem entre 6 e 8 caracteres
    if ($senha === $confimaSenha) { #verifica se são iguais
        $stmt = $bd -> prepare('SELECT email FROM usuario WHERE email = :email');
        $stmt -> bindParam(':email', $email);
        $stmt -> execute([$email]);
        $user = $stmt -> fetchAll();
    
        if ($user) { #se encontrar email igual
            ?>
                 <div class="modal-header shadow bg-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" fill="white" class="bi bi-exclamation-octagon mx-auto" viewBox="0 0 16 16">
                        <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                </div>
                <div class="modal-body text-center">
                    <p class="fs-4 fw-bolder p-0">O email informado já existe</p>
                </div>
            <?php
        } else {
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $stmt = $bd -> prepare("INSERT INTO usuario (nomeUsuario, email, senha, ativo) VALUES (:nomeUsuario, :email, :senha, 'S')");
            $stmt -> bindParam(':nomeUsuario', $nome);
            $stmt -> bindParam(':email', $email);
            $stmt -> bindParam(':senha', $senha);
        
            if ($stmt -> execute()) { #se inseriu
                ?>
                    <div class="modal-header shadow bg-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" fill="white" class="bi bi-check-circle mx-auto" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                    </div>
                    <div class="modal-body text-center">
                        <p class="fs-4 fw-bolder p-0">Cadastrado com sucesso!</p>
                    </div>
                    <script>
                        setTimeout(() => {
                            location.href = '/PI/paginas/login.php';
                        }, 1700);
                    </script>
                <?php
            } else {
                ?>
                    <div class="modal-header shadow bg-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" fill="white" class="bi bi-x-octagon" viewBox="0 0 16 16">
                            <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </div>
                    <div class="modal-body text-center">
                        <p class="fs-4 fw-bolder p-0">Falha ao cadastrar.</p>
                    </div>
                    <script>
                        setTimeout(() => {
                            location.href = '/PI/paginas/cadastro.php';
                        }, 1700);
                    </script>
                <?php
            }
        }
    } else { #Se a senha for incorreta
        ?> 
            <div class="modal-header shadow bg-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" fill="white" class="bi bi-exclamation-octagon mx-auto" viewBox="0 0 16 16">
                    <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
            </div>
            <div class="modal-body text-center">
                <p class="fs-4 fw-bolder p-0">As senhas não correspondem.</p>
            </div>
        <?php
    }
} else {
    ?> 
        <div class="modal-header shadow bg-warning">
            <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" fill="white" class="bi bi-exclamation-octagon mx-auto" viewBox="0 0 16 16">
                <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
            </svg>
        </div>
        <div class="modal-body text-center">
            <p class="fs-4 fw-bolder p-0">A senha deve possuír entre 6 e 8 caracteres.</p>
        </div>
    <?php
}