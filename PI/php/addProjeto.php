<?php

//tirando os erros devido o modal.
error_reporting(0);
ini_set('display_errors', 0);
//

session_start();
require_once '../config/conexao.php';

$nomeUsuario = $_SESSION['nm'];
$nomeProjeto = $_POST['nome'];
$data = $_POST['data'];
$desc = $_POST['desc'];
$categoria = $_POST['categoria']; //recebe valor do select.

if (isset($_POST['ativo'])) {
    if ($_POST['ativo'] == "S")
         $ativo = 'S';
    else 
        $ativo = 'N';
}

#Achar o id do usuario.
$stmt = $bd -> prepare("SELECT IdUsuario FROM usuario_LL WHERE nomeUsuario = '$nomeUsuario'");
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
    "INSERT INTO projeto_LL (IdProjeto, IdUsuario, IdCategoria, nomeProjeto, imagens, dataPostagem, descricao, ativo) 
    SELECT ISNULL(MAX(IdProjeto), 0) + 1, {$val['IdUsuario']}, $categoria, '$nomeProjeto', :imagens, '$data', '$desc', '$ativo' 
    FROM projeto_LL"
);

$stmt -> bindParam(':imagens', $arquivoEnviado);
$stmt -> execute();

#mostra o ID do projeto
$stmt = $bd -> query("SELECT (MAX(IdProjeto)) AS ID FROM projeto_LL WHERE nomeProjeto = '$nomeProjeto'");
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);
$_SESSION['idProjeto'] = $val['ID'];

if ($val) {
    ?> 
        <p class="fs-4 fw-bolder">Projeto cadastrado com sucesso!</p>
        <script>
            setTimeout(() => {
                location.href = '/PI/paginas/meusPortifolios.php';
            }, 1000);
        </script>
    <?php
}