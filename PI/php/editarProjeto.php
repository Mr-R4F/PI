<?php

session_start();
require_once '../config/conexao.php';

$nomeProjeto = htmlspecialchars($_POST['nome']);
$data = $_POST['data'];
$desc = htmlspecialchars($_POST['desc']);
$ativo = $_POST['ativo'];

$arquivoEnviado = '';

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
    "UPDATE projeto SET nomeProjeto = '$nomeProjeto', dataPostagem = '$data', ativo = '$ativo', imagens = '$arquivoEnviado', descricao = '$desc'
    WHERE IdProjeto = {$_GET['id']};
");
            
if ($stmt -> execute()) {
    ?>
        <div class="modal-header shadow bg-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" fill="white" class="bi bi-check-circle mx-auto" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
            </svg>
        </div>
        <div class="modal-body text-center">
            <p class="fs-4 fw-bolder p-0">Projeto atualizado com sucesso!</p>
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
            <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" fill="white" class="bi bi-x-octagon mx-auto" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
            </svg>
        </div>
        <div class="modal-body text-center">
            <p class="fs-4 fw-bolder p-0">Falha ao atualizar projeto.</p>
        </div>

        <script>
            setTimeout(() => {
                location.href = '/PI/paginas/configuracoesER.php?id=<?php echo $_GET['id']?>';
            }, 1700);
        </script>
    <?php
}