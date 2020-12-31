<?php
  include("config.php");

  $promessas = $conexao->query("SELECT * FROM tb_promessas")->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
  <link rel="icon" href="./favicon.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
            
  <title>GoFiscal</title>
</head>
<body>
<nav style="background-color: #4b92b6; margin-bottom: 0px;  "  class="row">
    <div class="nav-wrapper col offset-m1 m10 s12">
      <a href="#" class="brand-logo">GoFiscal</a>
      <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Início</a></li>
        <li><a href="estatisticas.php">Estatísticas</a></li>
        <li><a class="dropdown-trigger" href="#" data-target="contribuir-dropdown">Cadastrar<i class="material-icons right">arrow_drop_down</i></a></li>
        <ul id="contribuir-dropdown" class="dropdown-content">
          <li><a href="politico.html">Políticos</a></li>
          <li><a href="promessa.php">Promessas</a></li>
        </ul>
      </ul>

      <ul class="sidenav" id="mobile-nav">
        <li><a href="index.php">Início</a></li>
        <li><a href="estatisticas.php">Estatísticas</a></li>
        <li><a href="politico.html">Cadastrar Políticos</a></li>
        <li><a href="promessa.php">Cadastrar Promessas</a></li>
      </ul>
    </div>
  </nav>

  
  <section style="background-color: #4b92b6;" class="row main hide-on-med-and-down valign-wrapper">
    <div style="height: 400px" class="col s12 m5  offset-m1 valign-wrapper">
      <div class="row">
        <h3 class="white-text">GoFiscal - Plataforma de fiscalização de candidatos eleitos</h3>
        <h5 class="white-text"><?php echo $promessas ?> promessas já cadastradas!</h5>
      </div>
    </div>

    <div class="col s5 hide-on-med-and-down">
      <img class="" height="320px" src="./img/searching.png" />
    </div>
  </section>

  <section style="background-color: #4b92b6;" class="row main hide-on-large-only">
    <div style="height: 400px" class="col s12  offset-m1 valign-wrapper">
      <div class="row center-align">
        <h3 class="white-text">GoFiscal - Plataforma de fiscalização de candidatos eleitos</h3>
        <h5 class="white-text"><?php echo $promessas ?> promessas já cadastradas!</h5>
      </div>
    </div>

  </section>

  <section class="row hide-on-med-and-down">
    <h3 class="center-align row ">Fiscalize seus Candidatos!</h3>
    <div class="row valign-wrapper" >
      <p class="col s5 flow-text offset-s1">
      Durante eleições, os candidatos prometem diversas coisas, porém, rapidamente a população
      se esquece dessas promessas, porém isso acabou! Com o GoFiscal, você pode registrar as promessas
      de seus candidatos para que possa cobrá-los futuramente!

    </p>

    <img class="col offset-s1 s4"  src="./img/happy.png" />
  
    </div>
  </section>

  <section class="row hide-on-large-only">
    <h3 class="center-align row ">Fiscalize seus Candidatos!</h3>
    <div class="row valign-wrapper center-align" >
      <p class="col s12 flow-text">
      Durante eleições, os candidatos prometem diversas coisas, porém, rapidamente a população
      se esquece dessas promessas, porém isso acabou! Com o GoFiscal, você pode registrar as promessas
      de seus candidatos para que possa cobrá-los futuramente!

    </p>
  
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(() => {
      $(".dropdown-trigger").dropdown();
      $('.sidenav').sidenav();
    });

  </script>
</body>
</html>