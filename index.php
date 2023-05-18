<?php
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Styles/CSS --------->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Bootsrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <title>Home Page</title>

  </head>

  <body>
    dfsdfgfg
    <header> <!-- Começo do cabeçario -->
      <div class="container-flex fixed-top">
        <div class="row ">
          <div class="col-12 bg-danger d-flex justify-content-center"> <!-- Logo Inicio -->
            <a class="navbar-brand" href="index.html"><span><i class="bi bi-pc-display"></i></span>Tec<strong>Blog</strong></a>
          </div><!-- Logo Fim -->

          <div class="col-12 "><!-- Navbar incio -->
            <nav class="navbar navbar-expand-md navbar-dark bg-danger ">
              <!-- Hamburger Button -->
              <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <!-- Link Menu -->
            
              <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav margin-navbar">
                  <li class="nav-item">
                    <a id="Home"   class="nav-link" href="index.php?link=1">Home</a>
                  </li>
                  <li class="nav-item">
                    <a    class="nav-link" href="index.php?link=12">Loja</a>
                  </li>
                  <?php if(isset($_SESSION['clienteLogado'])) { ?>
                    <li class="nav-item">
                     <a   class="nav-link" href="index.php?link=11"><?= $_SESSION['clienteLogado']; ?></a>
                    </li>
                    <li class="nav-item">
                     <a   class="nav-link" href="index.php?link=6&acaoc=sair">Sair</a>
                    </li>
                  <?php }else { ?>
                  <li class="nav-item">
                    <a   class="nav-link" href="index.php?link=10">Entrar</a>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            

            </nav>
          </div> <!-- Navbar Fim -->
        </div>
      </div>
    </header> <!-- Fim do cabeçario -->

  
    <article class="container-fluid main-container"> <!-- Container Principal -->
      <?php
        $link = @$_GET['link'];
        $pag[1] = 'principal.php';
        $pag[2] = 'formCadUsuario.php';
        $pag[3] = 'usuario.controller.php';
        $pag[4] = 'areaRestrita.php';
        $pag[5] = 'formCadCliente.php';
        $pag[6] = 'cliente.controller.php';
        $pag[7] = 'formCadProduto.php';
        $pag[8] = 'produto.controller.php';
        $pag[9] = 'formLoginUsuario.php';
        $pag[10] = 'formLoginCliente.php';
        $pag[11] = 'areaRestritaCliente.php';
        $pag[12] = 'listaProdutos.php';
        $pag[13] = 'Produtos.php';
        $pag[14] = 'carrinho.controller.php';

        if(!empty($link)){
          if (file_exists($pag[$link])){
            include $pag[$link];

          }else{
            trim(include 'principal.php');
          }
        }
      ?>
    </article> <!-- Container Principal Fim -->

    <footer class="container-flex"> <!-- Footer Inicio  -->
      <div class="row ">
        <div class="col-12 text-white p-3 bg-dark d-flex justify-content-center">
          Todos os direitos reservados © 2022
          <div>         
          <br><a href="index.php?link=4">Área restrita</a>
          <?php
            if(isset($_SESSION['usuarioLogado'])){
              echo "Nome: ".$_SESSION['usuarioLogado'].
              "<br><a href='index.php?link=3&acao=sair'>Sair</a>" ;
              
            }
          ?>
          </div>
        </div>
        
      </div>
    </footer><!-- Footer Fim -->






























    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Javascript --->
    <script type="text/javascript" src="javascript.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>