<?php
  include("config.php");
  extract($_GET);

  $consulta = $conexao->query("SELECT * FROM tb_politicos");
  $politicos = [];

  while($resultado = $consulta->fetch_assoc()){
    array_push($politicos, $resultado);
  }
  
  if(isset($politico)){
    $politico_selecionado = $conexao->query("SELECT * FROM tb_politicos WHERE POL_CODIGO = $politico");
    $politico_selecionado_nome = $politico_selecionado->fetch_assoc()['pol_nome'];
  }

?>
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

  <style>
    .see-more, .see-more-not-finished {
      display: none;
    }
  </style>
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
    <div class="row col s10 offset-s1">
      <form class="col s12" action="estatisticas.php" method="get">
          <div class="row">
            <div class="input-field col s12">
              <select onchange="this.form.submit()" name="politico" id="politico">
                <option disabled selected>Selecione o político</option>
                <?php
                
                  foreach ($politicos as $politico_){
                    echo '<option value="'.$politico_['pol_codigo'].'">'.$politico_['pol_nome']."</option>";
                  
                  }
                ?>
              </select>    
            </div>
          </div>
      </form>
    </div>

  <div class="row col s10 offset-s1">
      <?php 

        if(!isset($politico)){
          echo '<h3 class="center-align">Selecione um político.</div>';
        }else{
          $promessas_cumpridas = $conexao->query("SELECT * FROM tb_promessas WHERE PRO_POL_CODIGO=$politico AND PRO_CUMPRIDA = 1");
          $promessas_nao_cumpridas = $conexao->query("SELECT * FROM tb_promessas WHERE PRO_POL_CODIGO=$politico AND PRO_CUMPRIDA = 0");
          
          if($promessas_nao_cumpridas->num_rows == 0 && $promessas_cumpridas->num_rows == 0){
            $porcentagem = 0;
          }elseif($promessas_nao_cumpridas->num_rows == 0 && $promessas_cumpridas->num_rows > 0){
            $porcentagem = 100;
          }else {
            $porcentagem = $promessas_cumpridas->num_rows / ($promessas_cumpridas->num_rows + $promessas_nao_cumpridas->num_rows) * 100;
          }
          
          echo '
            <div class="row">
              
            <h3 class="center-align">'.$politico_selecionado_nome.'</h3>
            
            <div class="">
            
            <div class="row">
              <div class="col s12 l4">
                <div class="card blue">
                  <div class="card-content center-align white-text text-flow">
                    <p>'.$promessas_cumpridas->num_rows.' promessas cumpridas</p>
                  </div>
                </div>
              </div>

            <div class="col s12 l4">
              <div class="card red">
                <div class="card-content center-align white-text text-flow">
                  <p>'.$promessas_nao_cumpridas->num_rows.' promessas pendentes</p>
                </div>
              </div>
            </div>

            <div class="col s12 l4">
              <div class="card green">
                <div class="card-content center-align white-text text-flow">
                  <p>'.floor($porcentagem).'% das promessas foram cumpridas</p>
               </div>
              </div>
            </div>
            

            </div>
            
            <div class="row">
            
            ';
        
          if($promessas_cumpridas->num_rows == 0 && $promessas_nao_cumpridas->num_rows == 0) {
              echo '<h4 class="center-align">Nenhuma promessa cadastrada.</h4>';
          }
          if($promessas_cumpridas->num_rows > 0){
              echo '<h4 class="center-align">Promessas cumpridas</h4>';
          }
          $cont = 0;
          while($promessa = $promessas_cumpridas->fetch_assoc()){
            $cont++;
            echo '
            <div class="col s12 m6 l4 '.($cont > 6 ? "see-more" : "").'">
            <div class="card ">
              <div class="card-content">
                <div class="chip right">'.$promessa['pro_data'].'</div>
                <span class="card-title">'.$promessa['pro_tema'].'</span>
                <p>'.$promessa['pro_descricao'].'</p>
              </div>
            </div>
            </div>
            ';
          }
          
          if($promessas_cumpridas->num_rows > 6){
            echo '<p class="center-align"><a class="waves-effect waves-light btn-small see-more-btn" onclick="showMore()">Ver mais</a></p>';
          }
          echo '
          
          
            </div>
            </div>
            
            <div class="row">
         ';
          if($promessas_nao_cumpridas->num_rows > 0){
              echo '<h4 class="center-align">Promessas não cumpridas</h4>';
          }
          $cont = 0;
          while($promessa = $promessas_nao_cumpridas->fetch_assoc()){
            $cont++;
            echo '
            <div class="col s12 m6 l4 '.($cont > 6 ? "see-more-not-finished" : "").'">
            <div class="card">
              <div class="card-content">
                <div class="chip right">'.$promessa['pro_data'].'</div>
                <span class="card-title">'.$promessa['pro_tema'].'</span>
                <p>'.$promessa['pro_descricao'].'</p>
                <a style="margin-top: 16px;" href="promessa_concluida.php?codigo='.$promessa['pro_codigo'].'" class="btn-small">Marcar como cumprida</a>

              </div>
            </div>
            </div>
            ';
          }
          if($promessas_nao_cumpridas->num_rows > 6){
            echo '<p class="center-align"><a class="waves-effect waves-light btn-small see-more-not-finished-btn" onclick="showMoreNotFinished()">Ver mais</a></p>';
          }
        }
        
        echo '</div></div></div>';
      ?>

  </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    const seeMore = false;
    const seemoreNotFinished = false;
    
    const showMore = () => {
      const promises = document.getElementsByClassName('see-more');
      for(let i = 0; i < promises.length; i++){
        promises[i].style.display = "block";
      }

      const seeMoreBtn = document.getElementsByClassName('see-more-btn')[0].style.display = "none";
    };

    const showMoreNotFinished = () => {
      const promises = document.getElementsByClassName('see-more-not-finished');
      for(let i = 0; i < promises.length; i++){
        promises[i].style.display = "block";
      }
      
      const seeMoreNotFinishedBtn = document.getElementsByClassName('see-more-not-finished-btn')[0].style.display = "none";
    };

    $(document).ready(() => {
      $(".dropdown-trigger").dropdown();
      $('select').formSelect();
      $('.sidenav').sidenav();
    });
  </script>
  </body>
</html>