<?php

session_start();
require_once '../config/conexao.php';

$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

$stmt = $bd -> prepare('SELECT nomeUsuario, IdUsuario, email, senha FROM usuario_LL WHERE email = :email');
$stmt -> bindParam(':email', $email);
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

if (password_verify($senha, $val['senha']) && isset($val['email'])) {
    $_SESSION['nm'] = $val['nomeUsuario'];
    $_SESSION['id'] = $val['IdUsuario'];
    
    ?> 
        <div class="modal-header shadow bg-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" fill="white" class="bi bi-check-circle mx-auto" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
            </svg>
        </div>
        <div class="modal-body text-center">
            <p class="fs-4 fw-bolder p-0">Logado com sucesso!</p>
        </div>
            <script>
            setTimeout(() => {
                location.href = '/PI/paginas/index.php';
            }, 1000);
        </script>
    <?php
} else {
    ?>  <div class="modal-header shadow bg-warning">
            <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" fill="white" class="bi bi-exclamation-octagon mx-auto" viewBox="0 0 16 16">
                <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
            </svg>
        </div>
        <div class="modal-body text-center">
            <p class="fs-4 fw-bolder p-0">Usuario ou senha incorretos</p>
        </div>
    <?php
}