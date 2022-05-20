<?php

session_start();
require_once '../config/conexao.php';

$codigo = $_POST['cod'];
$stmt = $bd -> query("SELECT nomeProjeto, imagens, dataPostagem FROM projeto WHERE IdProjeto = '$codigo'");
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($val) {
    $img = 'N/D';
    if (!empty($val['imagens'])) { #verificar se existe imagem
        if(is_file($val['imagens'])) #verifica se o arquivo existe
            $img = "<img src='{$val['imagens']}' alt='' width='100%' height='210'>";
    }

    echo $img . $val['nomeProjeto'] . $_SESSION['id'] . $val['dataPostagem'] . $codigo;
    ?>
    <form action="../paginas/configuracoesER.php" method="post">
     <button name='submit'>Editar</button>
     </form>
     <?php
}




















/*
session_start();
require_once '../config/conexao.php';

$codigo = $_POST['cod'];

$stmt = $bd -> query("SELECT * FROM projeto WHERE IdProjeto = '$codigo'");
$stmt -> execute();

var_dump($stmt);

if ($stmt -> fetch(PDO::FETCH_ASSOC) > 0) {
    foreach ($stmt as $vals) {
        $img = 'N/D';
        if (!empty($vals['imagens'])) { #verificar se existe imagem
            if(is_file($vals['imagens'])) #verifica se o arquivo existe
                $img = "<img src='{$vals['imagens']}' alt='' width='100%' height='210'>";
        }
    }
}

*/

/*
else { #Se não, o ID é criado e o botão ADD, é liberado.
    ?> 
        <script>
            alert('Id Não encontrado. Criando novo');
                <?php  
                    $stmt = $bd -> prepare(
                                "INSERT INTO projeto (IdProjeto, Idusuario, IdCategoria, nome, imagem, dataPostagem, descricao, ativo) 
                                SELECT MAX(IdProjeto) + 1, 3, 2, 'minhas produções', '12444365', '2001-04-01', 'olá 9856y8', 'N' FROM projeto"
                    );
                    $stmt -> execute();
                            
                    $stmt = $bd -> query("SELECT IdProjeto FROM projeto WHERE IdProjeto = $codigo");
                    $val = $stmt -> fetch(PDO::FETCH_ASSOC);
                            
                    if ($val) {
                        echo 'Seu novo ID é: ' . $val['IdProjeto'];
                    }
                ?>
        </script>
    <?php

}

/*
$stmt = $bd -> prepare('SELECT IdProjeto FROM projeto WHERE IdProjeto = (SELECT MAX(IdProjeto) FROM projeto)');
$stmt -> execute();
$val = $stmt -> fetch(PDO::FETCH_ASSOC);

if (isset($val)) {
    echo $val['IdProjeto'];
}

var_dump($stmt);
*/