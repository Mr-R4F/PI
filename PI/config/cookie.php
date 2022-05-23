<?php

if (isset($_POST['enviar']))  {
    $id = $_POST['nome'];
    setcookie('user', $id, time() + (86400 * 30), "/");
    header('location: ../paginas/index.php');
}