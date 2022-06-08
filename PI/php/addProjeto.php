<?php

session_start();
require_once '../config/conexao.php';

$nomeUsuario = $_SESSION['nm'];
$nomeProjeto = htmlspecialchars($_POST['nome']);
$data = $_POST['data'];
$desc = htmlspecialchars($_POST['desc']);
$categoria = $_POST['categoria']; //recebe valor do select.

if (isset($_POST['ativo'])) {
    if ($_POST['ativo'] == "S")
        $ativo = 'S';
    else 
        $ativo = 'N';
}

#Achar o id do usuario.
$stmt = $bd -> prepare("SELECT IdUsuario FROM usuario WHERE nomeUsuario = '$nomeUsuario'");
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

#prepara o arquivo de imagem
$arquivoEnviado = '';

if($_FILES['img']['error'] == 0 && $_FILES['img']['size'] > 0){
    $mimeType = mime_content_type($_FILES['img']['tmp_name']);

    $campos = explode('/', $mimeType);
    $tipo = $campos[0];
    $ext = $campos[1];

    if($tipo == 'image') {
        $arquivoEnviado = '../imagens/' . $_FILES['img']['name'] . '_' . md5(rand(-9999999, 9999999) . microtime()) . '.' . $ext;
        move_uploaded_file($_FILES['img']['tmp_name'], "$arquivoEnviado");
    } 
    else{
        echo "Arquivo ignorado por não se tratar de um arquivo de imagem<br>";
    }
}

#insere todo o conteudo
$stmt = $bd -> prepare(
    "INSERT INTO projeto (IdProjeto, IdUsuario, IdCategoria, nomeProjeto, imagens, dataPostagem, descricao, ativo) 
    SELECT ISNULL(MAX(IdProjeto), 0) + 1, {$val['IdUsuario']}, $categoria, '$nomeProjeto', :imagens, '$data', '$desc', '$ativo' 
    FROM projeto"
);

$stmt -> bindParam(':imagens', $arquivoEnviado);

if ($stmt -> execute()) { #Se inseriu tudo.
    ?> 
        <div class="modal-header shadow bg-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" fill="white" class="bi bi-check-circle mx-auto" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
            </svg>
            </div>
            <div class="modal-body text-center">
                <p class="fs-4 fw-bolder">Projeto cadastrado com sucesso!</p>
            </div>
        <script>
            setTimeout(() => {
                location.href = '/PI/paginas/meusPortifolios.php';
            }, 1000);
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
                <p class="fs-4 fw-bolder">Falha ao cadastrar Projeto.</p>
            </div>
        <script>
            setTimeout(() => {
                location.href = '/PI/paginas/addProjeto.php';
            }, 1000);
        </script>
    <?php
}