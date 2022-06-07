<?php 
    require_once '../config/conexao.php';
    require('../config/controleDeAcesso.php');
    require('../php/listarPortifolios.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="/PI/js-css/header.css" rel="stylesheet" type="text/css">
            <link href="/PI/js-css/footer.css" rel="stylesheet" type="text/css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <title>Configurações</title>
    </head>
    <body>
        <header class="header p-2 pb-1 col-lg-12 fixed-top">
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <a href="/" class="navbar-brand text-decoration-none text-white">
                        <img src="../js-css/logo-b.png" alt="logo" height="40px">
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
                    <img src="../js-css/logo-w.png" alt="logo" height="40px">
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
                <p class="display-5 mt-5 col-6">Meus projetos</p>

                <div class="row">
                    <div class="col-12 mx-auto">    
                        <div class="projeto card shadow-lg">
                            <a href="/PI/paginas/configuracoesAdd.php" class="btn btn-outline-secondary col-2 mx-auto mb-4 mt-4" id="addNovo">Adicionar novo</a>
                            <div class="card-body">
                                <?php 
                                    if($lin['lin'] > 0) { #Entra aqui se não houver resultados.
                                        while ($val = $stmt -> fetch(PDO::FETCH_ASSOC)) { 
                                            ?>
                                                <div class="col-10 mx-auto mb-3">
                                                    <a href="../paginas/configuracoesER.php?id=<?php echo $val['IdProjeto']?>" class="link text-decoration-none text-muted">
                                                        <div class="card shadow d-flex flex-wrap justify-content-center justify-content-lg-start">
                                                            <div class="row align-items-center">
                                                                <div class="col-4">
                                                                    <img src="<?php echo $val['imagens']; ?>" height="260px" class="card-img overflow-hidden bg-dark">
                                                                </div>
                                                                <div class="col-6 ms-5">
                                                                    <p class="card-text px-2 fs-5 fw-semibold">Nome: <?php echo $val['nomeProjeto']; ?></p>
                                                                    <p class="card-text px-2 mt-4 fs-5 fw-semibold">Data da Postagem: <?php $data = new DateTime($val['dataPostagem']); echo $data->format('d-m-Y'); ?></p>
                                                                    <p class="card-text px-2 mt-4 fs-5 fw-semibold">ID: <?php echo $val['IdProjeto'] ?></p>
                                                                    <p class="card-text px-2 mt-4 fs-5 fw-semibold">Ativo: <?php echo $val['ativo'] == 'S' ? 'Sim' : 'Não'; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php
                                        }  
                                    } else { #Se houver, entra aqui.
                                        ?>
                                            <div class="col-12 mb-3 mt-3 text-center">
                                                <p class="display-4">Nenhum projeto.......</p>
                                                <p class="lead">Adicione o seu primeiro projeto!</p>
                                            </div>
                                        <?php
                                    } 
                                ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
                                    
        <footer class="bg-dark w-100 mt-5">
            <div class="container-fluid">
                <div class="d-flex flex-wrap justify-content-start align-items-center py-3 shadow-sm">
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
            <script src="script.js"></script>
    </body>
</html>