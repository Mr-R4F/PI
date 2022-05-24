<?php 
    require('../config/controleDeAcesso.php');
    require_once '../config/conexao.php';
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
        <title>Configurações</title>
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
                
                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                        </form>
                
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
        <main>
            <section class="container">
                    <p class="display-6 mt-5 bg-light col-6">Painel de configurações do portifólio</p>

                    <div class="row">     
                        <div class="col-10 mx-auto my-auto">
                            <div class="card text-center pt-4 pb-4">
                    
                                <form action="../php/editarRemoverProjeto.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
                                    <?php
                                       require('../php/edicaoPortifolio.php');
                                    ?>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-5">
                                                    <img src="<?php echo $val['imagens'] ?>" alt="" width="100%" height="500px" id="imgPrevia">
                                                </div>
                                                <div class="col-7">
                                                    <label for="cod" class="form-label">Cod.:</label>
                                                    <input type="number" class="form-control" id="cod" name="cod" value="<?php echo $_GET['id']; ?>" disabled>
                                                                    
                                                    <label for="nome" class="form-label mt-4">Nome do projeto</label>
                                                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $val['nomeProjeto']; ?>">

                                                    <label for="autor" class="form-label mt-4">Autor</label>
                                                    <input type="text" class="form-control" id="autor" name="autor" value="<?php echo ucfirst($_SESSION['nm']); ?>" disabled>

                                                    <label for="categoria" class="form-label mt-4">Categoria</label>
                                                    <select class="form-select" id="categoria" name="categoria">
                                                        <option>Programação</option>
                                                        <option>Jogos</option>
                                                        <option>Livros</option>
                                                        <option>3D</option>
                                                        <option>Pinturas digitais</option>
                                                        <option>Pinturas</option>
                                                        <option>Imagens</option>
                                                    </select>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="cod" class="form-label mt-4">Data</label>
                                                                <input type="date" class="form-control" id="data" name="data">
                                                            </div>         
                                                        </div>

                                                        <div class="col-6">
                                                            <p class="p mt-4">Ativo ?</p>
                                                            <div class="row">
                                                            <div class="col-12">
                                                        <div class="form-check form-check-inline">
                                                            <?php echo $ativoS ?>
                                                            <label class="form-check-label" for="s">Sim</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <?php echo $ativoN ?>
                                                            <label class="form-check-label" for="n">Não</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--row-ativo-->
                                        </div>
                                                                
                                        <div class="form-group">
                                            <label for="img" class="form-label mt-4">Imagem</label>
                                            <input type="file" class="form-control" id="img" name="img" onchange="imgPreview(this)">
                                        </div>
                                                                
                                        <div class="form-group">
                                            <label for="descricao" class="form-label mt-4">Descriçao</label>  
                                            <textarea name="desc" id="descricao" class="form-control" cols="20" rows="5"><?php echo $val['descricao']; ?></textarea>
                                        </div>
                                        <button type="submit" name="edita" class="btn btn-outline-secondary w-25 mt-5 mb-4">Editar</button>
                                        <button type="submit" name="deleta" class="btn btn-outline-secondary w-25 mt-5 mb-4">Excluir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </section>
        </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="/PI/js-css/imagemPreview.js"></script>
    </body>
</html>