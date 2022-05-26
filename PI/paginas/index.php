<?php 
    require('../config/controleDeAcesso.php');
    require('../php/ativo.php');
    require('../php/pesquisa.php');
?>

<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="" rel="stylesheet" type="text/css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <title>Index</title>
    </head>
    <body>
        <header class="p-3 mb-3 border-bottom bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-light text-decoration-none">
                        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                        <span class="fs-4 me-5">LOGO</span>
                    </a>
            
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-2 link-light">Overview</a></li>
                        <li><a href="#" class="nav-link px-2 link-light">Inventory</a></li>
                        <li><a href="#" class="nav-link px-2 link-light">Customers</a></li>
                        <li><a href="#" class="nav-link px-2 link-light">Products</a></li>
                    </ul>
            
                   
            
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="index.php">Home</a></li>
                            <li><a class="dropdown-item" href="meusPortifolios.php">Meus portifólios</a></li>
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/PI/config/logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <main class="pt-2 pb-2">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <img src="https://github.com/mdo.png" alt="mdo" width="100" height="100" class="rounded-circle me-3">
                    <h1 class="display-4">OLÁ, <?php echo ucfirst($_SESSION['nm']); ?>!</h1>
                </div>

                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <p class="display-4 mt-5 bg-light">Explore a comunidade</p>
                </div>

                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mt-4 mb-4 border-bottom">
                    <ul class="list-group list-group-flush col-12 col-md-auto mb-2 justify-content-center mb-md-0">  
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Filtro</button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="?ordem=AZ">AZ</a></li>
                                <li><a class="dropdown-item" href="?ordem=ZA">ZA</a></li>
                                <li><a class="dropdown-item" href="?ordem=autor">Nome do autor</a></li>
                            </ul>
                        </div>
                        <?php 
                            if (isset($_GET['ordem']))
                                require('../php/filtro.php');
                        ?>
                    </ul>
                    <form action="#" method="get" class="col-12 d-flex col-lg-auto mb-3 mb-lg-0 me-lg-3 mx-auto" role="search">
                        <input type="search" name="pesquisa" class="form-control" placeholder="Search..." aria-label="Search">
                        <button type="submit" id="btn" class="btn btn-outline-secondary ms-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </form>

                    <ul class="list-group list-group-horizontal col-12 col-md-auto mb-2 justify-content-center mb-md-0 me-start">
                        <li class="list-group-item flex-fill"><a href="#" class="nav-link px-2 link-dark">Populares</a></li>
                        <li class="list-group-item flex-fill"><a href="#" class="nav-link px-2 link-dark">Recentes</a></li>
                        <li class="list-group-item flex-fill"><a href="#" class="nav-link px-2 link-dark">Destaques</a></li>
                        <li class="list-group-item flex-fill">
                            <form action="#">
                                <select class="form-select px-2" name="" id="">
                                    <option value="filtro" selected disabled>Categorias</option>
                                    <option value="">3D</option>
                                    <option value="">Programação</option>
                                    <option value="">Pintura</option>
                                </select>
                            </form>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <?php 
                        if (isset($_GET['id'])) #Se tiver definido chama o modal
                            require('../php/infoPortifolio.php'); // Terminar o modal***..

                        while($val = $stmt -> fetch(PDO::FETCH_ASSOC)) { //while do ativo/ pesquisa /filtro / modal
                            ?> 
                                <div class="col-4 d-flex mx-auto mt-5 text-center teste">
                                    <a href="?id=<?php echo $val['IdProjeto']?>" class="link" id="<?php echo $val['IdProjeto'] ?>">
                                        <div class="card me-3 mb-5">
                                            <p><?php echo $val['nomeProjeto']?></p>
                                            <img src="<?php echo $val['imagens']; ?>" alt="N/D" width="410px" height="250px" class="bg-secondary">
                                            <p><?php echo $val['nomeUsuario']?></p>
                                        </div>
                                    </a> 
                                </div>
                            <?php

                            if (isset($_GET['id'])) { #Se tiver definido constroi o modal
                                ?> 
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p><?php echo $val['nomeProjeto']?></p>
                                                    <img src="<?php echo $val['imagens']; ?>" alt="N/D" width="410px" height="250px" class="bg-secondary">
                                                    <p><?php echo $val['nomeUsuario']?></p>
                                                </div>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Understood</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>               
        </main>

        <footer>
        </footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="/PI/js-css/modal.js"></script>
    </body>
</html>