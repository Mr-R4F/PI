<?php

error_reporting(0);
ini_set('display_errors', 0);

session_start();
require_once '../config/conexao.php';


$nomeProjeto = $_POST['nome'];
$data = $_POST['data'];
$desc = $_POST['desc'];
$ativo = $_POST['ativo'];

if (isset($_POST['edita'])) {
    if($_FILES['img']['error'] == 0 && $_FILES['img']['size'] > 0){
        $mimeType = mime_content_type($_FILES['img']['tmp_name']);
    
        $campos = explode('/', $mimeType);
        $tipo = $campos[0];
        $ext = $campos[1];
    
        if($tipo == 'image') {
            $arquivoEnviado = '../imagens/' . $_FILES['img']['name'] . '_' . md5(rand(-9999999, 9999999) . microtime()) . '.' . $ext;
            move_uploaded_file($_FILES['img']['tmp_name'], "$arquivoEnviado");
        } else{
            echo "Arquivo ignorado por não se tratar de um arquivo de imagem<br>";
        }
    }
    
    if (isset($_POST['ativo'])) {
        if ($_POST['ativo'] == "S")
            $ativo = 'S';
        else 
            $ativo = 'N';
    }
    
    $stmt = $bd -> prepare(
        "UPDATE projeto_LL SET nomeProjeto = '$nomeProjeto', dataPostagem = '$data', ativo = '$ativo', imagens = '$arquivoEnviado', descricao = '$desc'
        WHERE IdProjeto = {$_GET['id']};
    ");
    
    if ($stmt -> execute()) {
        ?> 
            <p class="fs-4 fw-bolder">Projeto atualizado com sucesso!</p>
            <script>
                setTimeout(() => {
                    location.href = '/PI/paginas/meusPortifolios.php';
                }, 1000);
            </script>
        <?php
    }
}

if (isset($_POST['deleta'])) {
    $stmt = $bd -> prepare("DELETE FROM projeto_LL WHERE IdProjeto = {$_GET['id']}");
    if ($stmt -> execute()) {
        ?> 
            <p class="fs-4 fw-bolder">Projeto deletado com sucesso!</p>
            <script>
                setTimeout(() => {
                    location.href = '/PI/paginas/meusPortifolios.php';
                }, 1000);
            </script>
        <?php
    }
}