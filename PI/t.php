<?php 
    require('../config/controleDeAcesso.php');
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
        <header>
            <nav class="navbar navbar-expand bg-dark">
                <div class="container">
                    <a href="" class="navbar-brand ms-5">
                        <img src="#" alt="LOGO">
                    </a>
                    <form class="d-flex" style="width: 500px;">
                        <div class="input-group">
                            <button class="input-group-text btn btn-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                            <input type="search" id="procurar" class="form-control" >
                        </div>
                    </form>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle me-5" role="button" data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="gray" class="bi bi-person-fill rounded-pill bg-light" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </a>
                        <ul class="dropdown-menu text-center">
                            <li>
                              <a class="dropdown-item" href="index.php">Home</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="meusPortifolios.php">Meus portifólios</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="/PI/config/logout.php">Logout</a>
                            </li>
                        </ul>
                    </li>
                </div><!--container-->
            </nav>
        </header>

        <main>
            <section class="container">
                    <p class="display-4 mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="gray" class="bi bi-person-fill rounded-pill bg-light" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                        <?php 
                            echo "OLÁ, " . ucfirst($_SESSION['id']) . "!";
                        ?>
                    </p>
            </section>
        </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="/Assets/script.js"></script>
    </body>
</html>