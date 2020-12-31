<?php
  include("config.php");

  $consulta = $conexao->query("SELECT * FROM tb_politicos");
  $politicos = [];

  while($resultado = $consulta->fetch_assoc()){
    array_push($politicos, $resultado);
  }

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
      <a href="index.php" class="brand-logo">GoFiscal</a>
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
  <div class="row">
    <span class="col s1 m2"></span>
    <form class="col s10 m8" action="cadastrar_promessa.php" method="post">
      <h3>Cadastro de promessas</h3>
      <div class="row">
        <div class="input-field col s12">
          <select required name="politico" id="politico">
            <option disabled selected value="">Selecione o político</option>
            <?php
            
              foreach ($politicos as $politico){
                echo '<option value="'.$politico['pol_codigo'].'">'.$politico['pol_nome']."</option>";
              
              }
            ?>
          </select>    
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <label for="tema">Tema:</label>
          <input required type="text" name="tema" id="tema">
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <label for="descricao">Descrição:</label>
          <input required type="text" id="descricao" name="descricao">    
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <label for="data">Data:</label>
          <input required onfocus="show_dp()" class="datepicker" type="text" name="data" id="data" />
        </div>
      </div>

      <div class="row">
        <div class="col s12">  
          <label>
            <input class="filled-in" type="checkbox" name="cumprida" id="cumprida" />
            <span>Concluida</span>
          </label>
        </div>
      </div>
      
      <div class="row">
        <div class="col s12">
          <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>

    </form>
    <span class="col s1 m2"></span>
              
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(() => {
      $(".dropdown-trigger").dropdown();
      $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
      $('select').formSelect();
      $("select[required]").css({display: "block", height: 0, padding: 0, width: 0, position: 'absolute'});

      $('.sidenav').sidenav();
    });

    function show_dp(){
     $(".datepicker").datepicker('open'); //Show on click of button
   }
  </script>
</body>

</html> 