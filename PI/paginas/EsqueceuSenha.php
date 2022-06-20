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
        <title>RECUPERAÇÃO DE SENHA</title>
    </head>
    <body style="height: 95vh;">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-3 mx-auto mt-5">
                    <form action="/PI/php/verificaEmail.php" method="post">
                        <fieldset class="me-3 ms-3">
                            <legend class="display-6 mt-5 mb-3 text-center text-white">Esqueceu a senha?</legend>
                            <p class="mb-5 text-center text-white">Confirme seu email para continuar</p>
                            <div class="form-floating">
                                <input type="email" class="form-control form-control-lg mt-1 mb-4" name="email" id="Email" placeholder="Email" autocomplete="off" required>
                                <label for="Nome" class="form-label text-white">Email</label>
                            </div>
                            <button type="submit" class="btn btn-outline-secondary mt-5 mb-4 w-50" id="prossiga">Prosseguir</button>
                        </fieldset>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="modalSenha" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                        <div class="modal-content rounder-5">

                        </div>
                    </div>
                </div>
            </div><!-- modal -->
        </div><!--container-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="/PI/js-css/validacao.js"></script>
            <script src="/PI/js-css/modalSenha.js"></script>
    </body>
</html>