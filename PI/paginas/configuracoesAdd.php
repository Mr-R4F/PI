<?php 
    require('../config/controleDeAcesso.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="/PI/js-css/header.css" rel="stylesheet" type="text/css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <title>Configurações</title>
    </head>
    <body>
        <header class="header p-2 pb-1 col-lg-12 fixed-top">
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <a href="#" class="navegacaonavbar-brand text-decoration-none text-white">

                    </a>

                    <form action="index.php?pesquisa=<?php $pesquisa ?>" method="get" class="d-flex col-lg-auto mb-lg-0 me-lg-5 w-50 d-lg-block d-sm-none d-none">
                        <div class="input-group">
                            <button type="submit" id="btn" class="btn btn-outline-light"></button>
                            <input type="search" name="pesquisa" class="form-control rounded-pill" placeholder="Pesquise um projeto..." aria-label="Search" autocomplete="off">
                        </div>
                    </form>

                    <a class="text-decoration-none d-lg-block d-sm-none d-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                        </svg>
                    </a>

                    <button class="navbar-toggler d-md-block d-lg-none d-block" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <span class="d-none fs-6 pe-1">s</span>
                    </button>
                </div>
            </nav> <!-- nav -->

            <div class="offcanvas offcanvas-end d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    
                </a>
                    <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="index.php" class="navegacao nav-link text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-house-door me-1" viewBox="0 0 16 16">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="meusPortifolios.php" class="nav-link text-white active" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-folder me-1" viewBox="0 0 16 16">
                                <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                            </svg>
                            Meus projetos
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="/PI/config/logout.php" class="logout nav-link text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-box-arrow-left me-1" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                            </svg>
                            Log out
                        </a>
                    </li>
                </ul>
            </div><!-- offcanvas  -->
        </header><!-- header -->

        <header class="p-2 mb-5 bg-light border-bottom d-lg-none d-md-block d-block">
            <form action="index.php?pesquisa=<?php $pesquisa ?>" method="get" class="d-flex col-lg-auto mb-lg-0 mx-auto w-50 d-lg-none d-md-block">
                <div class="input-group">
                    <button type="submit" id="btn" class="btn btn-outline-light"></button>
                    <input type="search" name="pesquisa" class="form-control rounded-pill" placeholder="Pesquise um projeto..." aria-label="Search" autocomplete="off">
                </div>
            </form>
        </header>

        <main style="margin-top: 6%;">
            <section class="container">
                <p class="display-5 mt-5 col-8">Painel de configurações do projeto</p>

                <div class="projeto card text-center shadow">
                    <form action="../php/addProjeto.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <img src="" width="100%" height="100%" id="imgPrevia" class="card-img">
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="autor" class="form-label">Autor</label>
                                            <input type="text" class="form-control shadow-sm" id="autor" name="autor" value="<?php echo ucfirst($_SESSION['nm']); ?>" disabled>
                                        </div>
                                        <div class="col-6">
                                            <label for="categoria" class="form-label">Categoria</label>
                                            <select class="form-select shadow-sm" id="categoria" name="categoria" required>
                                                <option value="1">Imagens</option>
                                                <option value="2">Protótipos</option>
                                                <option value="3">Projetos</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="nome" class="form-label mt-4">Nome do projeto</label>
                                            <input type="text" class="form-control shadow-sm" id="nome" name="nome" required autocomplete="off">
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cod" class="form-label mt-4">Data</label>
                                                <input type="date" class="form-control shadow-sm" id="data" required name="data">
                                            </div> 
                                        </div>
                                        <div class="col-6">
                                            <p class="p mt-4">Ativo ?</p>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input shadow-sm" type="radio" name="ativo" id="s" value="S" required>
                                                        <label class="form-check-label" for="s">Sim</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input shadow-sm" type="radio" name="ativo" id="n" value="N" required>
                                                        <label class="form-check-label" for="n">Não</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="img" class="form-label mt-4">Imagem</label>
                                                <input type="file" class="form-control shadow-sm" id="img" name="img" onchange="imgPreview(this)" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="descricao" class="form-label mt-4">Descrição</label>  
                                                    <textarea name="desc" id="descricao" class="form-control shadow-sm" cols="20" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>        
                                    </div>
                                </div>           
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" name="add" class="btn btn-outline-secondary col-2 mt-5 mb-4" id="add">Adicionar</button>
                            </div> 
                        </div>
                    </form>
                </div>

                <div class="modal fade" id="modalAdd" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                        </div>
                    </div>
                </div>
            </div><!-- modal -->
            </section>
        </main>

        <footer class="bg-dark position-relative bottom-0 w-100 mt-5">
            <div class="container-fluid">
                <div class="d-flex flex-wrap justify-content-start align-items-center py-4 shadow-sm">
                    <div class="col-md-4 d-flex align-items-center">
                        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
                        </a>
                            <span class="mb-3 mb-md-0 text-muted">&copy; 2022 <i><b>Project.</b></i>io</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="/PI/js-css/imagemPreview.js"></script>
            <script src="/PI/js-css/modalAdd.js"></script>
    </body>
</html>