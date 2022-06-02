<?php 
    require('../config/controleDeAcesso.php');
    require('../php/ativo.php');
    require('../php/paginacao.php');
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
        <title>Index</title>
    </head>
    <body>
        <header class="header p-2 pb-1 col-lg-12 bg-dark fixed-top">
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <a href="#" class="navegacao navbar-brand text-decoration-none text-white">
                        <img src="" alt="LOGO" class="d-inline-block">
                    </a>

                    <form action="#" method="get" class="d-flex col-lg-auto mb-lg-0 me-lg-5 w-50 d-lg-block d-sm-none d-none">
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
                    <svg class="bi pe-none me-2" width="40" height="32">LOGO</svg>
                    <span class="fs-4"><i><b>Projet.</b></i>io</span>
                </a>
                    <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-house-door me-1" viewBox="0 0 16 16">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="meusPortifolios.php" class="navegacao nav-link text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-folder me-1" viewBox="0 0 16 16">
                                <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                            </svg>
                            Meus projetos
                        </a>
                    </li>
                    <li>
                        <a href="#" class="navegacao nav-link text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person me-1" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                            Perfil
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
        
        <header class="p-2 mb-5 bg-light border-bottom d-lg-none d-md-block d-block fixed-top">
            <form action="#" method="get" class="d-flex col-lg-auto mb-lg-0 mx-auto w-50 d-lg-none d-md-block">
                <div class="input-group">
                    <button type="submit" id="btn" class="btn btn-outline-light"></button>
                    <input type="search" name="pesquisa" class="form-control rounded-pill" placeholder="Pesquise um projeto..." aria-label="Search" autocomplete="off">
                </div>
            </form>
        </header><!-- header -->

        <main class="pb-2" style="margin-top: 6%;">
            <div class="container-fluid">
                <div class="row">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <img src="https://github.com/mdo.png" alt="mdo" width="100" height="100" class="rounded-circle me-3">
                        <h1 class="display-4">OLÁ, <?php echo ucfirst($_SESSION['nm']); ?>!</h1>
                    </div><!-- div -->

                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <p class="display-4 mt-5">Explore a comunidade</p>
                    </div><!-- div -->

                    <div class="col-12 shadow-lg d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mt-4 border-bottom border-top bg-light">
                        <form action="#" method="get" class="d-flex col-lg-auto mb-lg-0 flex-fill">
                            <div class="input-group">
                                <button type="submit" id="btn2" class="btn btn-outline-light"></button>
                                <input type="search" name="pesquisa" class="form-control form-control-lg rounded-pill" placeholder="Pesquise um projeto..." aria-label="Search" autocomplete="off">
                            </div>
                        </form>
                        <ul class="list-group list-group-horizontal col-12 col-md-auto mb-2 justify-content-center mb-md-0 ms-5">
                            <li class="list-group-item flex-fill">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Classificar</button>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="?ordem=AZ">A-Z</a></li>
                                        <li><a class="dropdown-item" href="?ordem=ZA">Z-A</a></li>
                                        <li><a class="dropdown-item" href="?ordem=autor">Nome do autor</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="list-group-item flex-fill">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Categoria</button>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="?categoria=imagem">Imagem</a></li>
                                        <li><a class="dropdown-item" href="?categoria=prototipos">Protótipos</a></li>
                                        <li><a class="dropdown-item" href="?categoria=projetos">Projetos</a></li>
                                    </ul>
                                    <?php 
                                        if (isset($_GET['categoria'])) //filtro categoria
                                            require('../php/filtroCategoria.php');
                                    ?>
                                </div>
                            </li>
                            <li class="list-group-item flex-fill"><a href="#" class="nav-link px-2 link-dark">Populares</a></li>
                            <li class="list-group-item flex-fill"><a href="?ordem=recentes" class="nav-link px-2 link-dark">Recentes</a></li>
                            <li class="list-group-item flex-fill"><a href="#" class="nav-link px-2 link-dark">Destaques</a></li>
                        </ul>
                    </div><!-- col -->

                    <div class="row mx-auto">
                        <?php 
                            if (isset($_GET['pesquisa'])) { #Se pesquisa estiver definida...
                                if ($lin['lin'] > 0) { #...e o resultado da linha for maior que 0 ...
                                    while($val = $stmt -> fetch(PDO::FETCH_ASSOC)) { #...entra nesse while aqui.
                                        ?> 
                                            <div class="col-3 mt-5 mb-3 text-center">
                                                <a href="?id=<?php echo $val['IdProjeto']?>" class="link text-decoration-none" data-id="<?php echo $val['IdProjeto'] ?>">
                                                    <div class="card mb-3">
                                                        <img src="<?php echo $val['imagens']; ?>" alt="N/D" height="350px" class="card-img bg-secondary">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="card shadow d-flex flex-row justify-content-around align-itens-center">
                                                                <p class="my-auto p-1"><?php echo $val['nomeUsuario']?></p> 
                                                                <p class="my-auto p-1"><?php echo $val['nomeProjeto']?></p> 
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="card shadow d-flex flex-row justify-content-around align-itens-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" class="bi bi-star my-auto p-1" viewBox="0 0 16 16">
                                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                                </svg> 
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" class="bi bi-eye-fill my-auto p-1" viewBox="0 0 16 16">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                </svg> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a> 
                                            </div>
                                        <?php
                                    }
                                } else { #Se não houver registros entra aqui
                                    ?> 
                                        <div class="col-12 mx-auto mt-5">
                                            <p class="display-1 p-5 text-center">Nenhum projeto encontrado</p>
                                            <p class="display-1 p-5 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="114" height="114" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                                </svg>
                                            </p>
                                            <p class="display-6 p-5 text-center">Os resultados da pesquisa "<?php echo $_GET['pesquisa']?>", não foram encontrados.</p>
                                        </div>
                                    <?php
                                }
                            } else { #Se pesquisa e páginas estiverem definidas, isso é executado.
                                if(isset($_GET['pag'])) {
                                    while($val = $stmt -> fetch(PDO::FETCH_ASSOC)) { 
                                        ?> 
                                            <div class="col-3 mt-5 mb-3 text-center">
                                                <a href="?id=<?php echo $val['IdProjeto']?>" class="link text-decoration-none" data-id="<?php echo $val['IdProjeto'] ?>">
                                                    <div class="card shadow mb-3">
                                                        <img src="<?php echo $val['imagens']; ?>" alt="N/D" height="350px" class="card-img bg-secondary">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="card shadow  d-flex flex-row justify-content-around align-itens-center">
                                                                <p class="my-auto p-1"><?php echo $val['nomeUsuario']?></p> 
                                                                <p class="my-auto p-1"><?php echo $val['nomeProjeto']?></p> 
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="card shadow d-flex flex-row justify-content-around align-itens-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" class="bi bi-star my-auto p-1" viewBox="0 0 16 16">
                                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                                </svg> 
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" class="bi bi-eye-fill my-auto p-1" viewBox="0 0 16 16">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a> 
                                            </div>
                                        <?php
                                    }
                                }
                                else { #Se pesquisa e página não estiverem definidos, as outras consultas entram aqui.
                                    while($val = $stmt -> fetch(PDO::FETCH_ASSOC)) { #while do ativo/ filtros
                                        ?> 
                                            <div class="col-3 mt-5 mb-3 text-center">
                                                <a href="?id=<?php echo $val['IdProjeto']?>" class="link text-decoration-none" data-id="<?php echo $val['IdProjeto'] ?>">
                                                    <div class="card shadow mb-3">
                                                        <img src="<?php echo $val['imagens']; ?>" alt="N/D" height="350px" class="card-img bg-secondary">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="card shadow  d-flex flex-row justify-content-around align-itens-center">
                                                                <p class="my-auto p-1"><?php echo $val['nomeUsuario']?></p> 
                                                                <p class="my-auto p-1"><?php echo $val['nomeProjeto']?></p> 
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="card shadow d-flex flex-row justify-content-around align-itens-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" class="bi bi-star my-auto p-1" viewBox="0 0 16 16">
                                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                                </svg> 
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" class="bi bi-eye-fill my-auto p-1" viewBox="0 0 16 16">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a> 
                                            </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        <div class="modal fade" id="staticBackdrop" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header shadow-sm">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                                        
                                    </div>
                                </div>
                            </div>
                        </div><!-- modal -->
                    </div><!-- row --> 
                    
                    <div class="row mt-5"><!-- arrumar paginação depois-->
                        <div class="col">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <?php   
                                        ?>  <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                        <?php 

                                        for ($i = 1; $i < $numPag + 1 ; $i++) {
                                            ?> 
                                                <li class="page-item"><a class="page-link" href="?pag=<?php echo $i; ?>&ordem=<?php echo isset($_GET['ordem']) ? $_GET['ordem']: '';?>"><?php echo $i;?></a></li>
                                            <?php
                                        }  

                                        ?> 
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        <?php
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!-- row -->
            </div><!-- container -->   
        </main><!-- main -->

        <footer>
        </footer><!-- footer -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="/PI/js-css/modal.js"></script>
    </body>
</html>