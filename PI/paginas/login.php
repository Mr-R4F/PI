<?php
    require('../config/quebrarPagina.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="cache-control" content="no-cache">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="/PI/js-css/estilo.css" rel="stylesheet" type="text/css">
            <link href="/PI/js-css/estilo-Login-Cadastro.css" rel="stylesheet" type="text/css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&family=Prompt:ital,wght@1,300&family=Raleway:wght@400;500&family=Roboto:wght@500&display=swap');
            </style>
        <title>LOGIN</title>
    </head>
    <body style="height: 95vh;">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-3 mx-auto mt-5">
                    <form action="/PI/php/loginUsuario.php" method="post">
                        <fieldset class="me-3 ms-3">
                            <legend class="display-3 mt-5 mb-3 text-center text-white">LOGIN</legend>
                            <p class="mb-5 text-center text-white">Logue para continuar</p>
                            <div class="form-floating">
                                <input type="email" class="form-control form-control-lg mt-1 mb-4" name="email" id="Email" placeholder="Email" autocomplete="off" required>
                                <label for="Nome" class="form-label text-white">Email</label>
                            </div>

                            <div class="form-floating">
                                <input type="password" class="form-control form-control-lg mt-4" name="senha" id="Senha" placeholder="Senha" autocomplete="off" required>
                                <label for="Senha" class="form-label text-white">Senha</label>
                            </div>
                            <p class="h6 mt-4 text-end"><a href="esqueceuSenha.php">Esqueceu a senha ?</a></p>
                            <button type="submit" class="btn btn-outline-secondary mt-5 mb-4 w-50" id="login">Login</button>
                            <p class="mt-5 text-center text-white">Não possui uma conta? <a href="cadastro.php" class="link text-white">Cadastre-se</a></p>
                        </fieldset>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="modalLogin" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                        <div class="modal-content rounder-5">
     
                        </div>
                    </div>
                </div>
            </div><!-- modal -->
        </div><!--container-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="/PI/js-css/validacao.js"></script>
            <script src="/PI/js-css/modalLogin.js"></script>
    </body>
</html>