<?php 
    require('../config/controleDeAcesso.php');
    require('../php/listarPortifolios.php');
    require('../php/recuperaDados.php');
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
                <p class="display-6 mt-5 bg-light col-6">Meus portifólios</p>

                <div class="row">
                    <div class="col-10 mx-auto">
                        <form action="../php/pesquisaCod.php" method="post" class="col-6 d-flex align-items-center mt-2">
                            <input type="search" name="cod" class="form-control" placeholder="Search..." aria-label="Search">
                            <button type="submit" class="btn btn-outline-secondary ms-2">Pesquisa</button>
                        </form>
                        <div class="card mt-5 mb-3 bg-light">
                            <div class="card-body">
                                <?php 
                                    $stmt = $bd -> query(
                                            "SELECT projeto.nomeProjeto, projeto.dataPostagem, projeto.imagens, projeto.descricao, projeto.ativo, projeto.IdProjeto
                                            FROM projeto
                                            INNER JOIN usuario ON usuario.IdUsuario = projeto.IdUsuario
                                            WHERE usuario.nomeUsuario = '$nome'
                                    ");
                                    $stmt -> execute();

                                    while ($val = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                                        $_SESSION['nomeProj'] = $val['nomeProjeto'];
                                        $_SESSION['dataPstg'] = $val['dataPostagem'];
                                        $_SESSION['descr'] = $val['descricao'];
                                        $_SESSION['imagem'] = $val['imagens'];
                                        $_SESSION['val'] = $val['IdProjeto'];
                                                    
                                        if ($val['ativo'] == 'S') {
                                            $_SESSION['inputSim'] = "<input class='form-check-input' type='radio' name='ativo' id='s' value='S' checked>";
                                            $_SESSION['inputNao'] = "<input class='form-check-input' type='radio' name='ativo' id='n' value='N'>";
                                        }
                                        elseif ($val['ativo'] == 'N') {
                                            $_SESSION['inputSim'] = "<input class='form-check-input' type='radio' name='ativo' id='s' value='S'>";
                                            $_SESSION['inputNao'] = "<input class='form-check-input' type='radio' name='ativo' id='n' value='N' checked>";
                                        }
    
                                        ?>
                                            <div class="col-11 mx-auto mb-3">
                                                <a href="../paginas/configuracoesER.php" class="link">
                                                    <div class="row align-items-center">
                                                        <div class='card shadow-sm d-flex flex-wrap justify-content-center justify-content-lg-start'>
                                                            <div class='row align-items-center'>
                                                                <div class='col-4'>
                                                                    <img src="<?php echo $_SESSION['imagem']; ?>" alt="imag" width="100%" height="250px">
                                                                </div>
                                                                <div class='col-6 mx-auto'>
                                                                    <p class='card-text px-2'><?php echo $_SESSION['nomeProj']; ?></p>
                                                                    <p class='card-text px-2 pt-4'><?php echo $_SESSION['dataPstg']; ?></p>
                                                                    <p class='card-text px-2 pt-4'><?php echo $_SESSION['val']; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php
                                    }
                                ?> 
                            </div>  
                            <a href="/PI/paginas/configuracoesAdd.php" class="btn btn-outline-secondary col-2 mx-auto mb-3 mt-3">Adicionar novo</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="script.js"></script>
    </body>
</html>