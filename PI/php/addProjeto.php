<?php

session_start();
require_once '../config/conexao.php';

$id = $_SESSION['id'];
$nome = $_POST['nome'];
$data = $_POST['data'];
$desc = $_POST['desc'];

if (isset($_POST['ativo'])) {
    if ($_POST['ativo'] == "S")
        $ativo = 'S';
    else 
        $ativo = 'N';
} else {
    ?> 
        <script>
            alert('Preencha o campo ativo');
            location.href = '/PI/paginas/configuracoesAdd.php';
        </script>
    <?php
}

#Achar o id do usuario.
$stmt = $bd -> prepare("SELECT IdUsuario FROM usuario_LL WHERE nomeUsuario = '$id'");
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($val) {
    ?>
        <script>
            alert('funciona'); 
        </script>
    <?php
    var_dump($val);
}

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

var_dump($ativo);
#insere todo o conteudo
$stmt = $bd -> prepare(
    "INSERT INTO projeto_LL (IdProjeto, IdUsuario, IdCategoria, nomeProjeto, imagens, dataPostagem, descricao, ativo) 
    SELECT ISNULL(MAX(IdProjeto), 0) + 1, {$val['IdUsuario']}, 1, '$nome', :imagens, '$data', '$desc', '$ativo' FROM projeto_LL"
);

$stmt -> bindParam(':imagens', $arquivoEnviado);

if ($stmt -> execute()) {
    ?>
        <script>
            alert('funciona');
        </script>
    <?php
}

#mostra o ID do projeto
$stmt = $bd -> query("SELECT (MAX(IdProjeto)) AS ID FROM projeto_LL WHERE nomeProjeto = '$nome'");
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($val) {
    echo 'ID do projeto: ' . $val['ID'];
    ?> 
        <script>
            location.href = '/PI/paginas/meusPortifolios.php';
        </script>
    <?php
}