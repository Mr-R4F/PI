<?php

session_start();
require_once '../config/conexao.php';

$nomeProjeto = $_POST['nome'];
$codigo = $_SESSION['codigo'];
$data = $_POST['data'];
$desc = $_POST['desc'];

if (isset($_POST['edita'])) {
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

    if (isset($_POST['ativo'])) {
        if ($_POST['ativo'] == "S")
            $ativo = 'S';
        else 
            $ativo = 'N';
    }

    $stmt = $bd -> prepare(
        "UPDATE projeto SET nomeProjeto = '$nomeProjeto', dataPostagem = '$data', ativo = '$ativo', imagens = '$arquivoEnviado', descricao = '$desc'
        WHERE IdProjeto = $codigo;
    ");

    if ($stmt -> execute());
        header('location: ../paginas/meusPortifolios.php');
}
else {
    if (isset($_POST['deleta'])) {
        $stmt = $bd -> prepare("DELETE FROM projeto WHERE IdProjeto = $codigo");
        if ($stmt -> execute()) {
            echo 'deletado!'; 
        }
    }
}