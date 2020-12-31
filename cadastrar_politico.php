<?php
  include("config.php");

  extract($_POST);

  $consulta = $conexao->query("INSERT INTO tb_politicos (pol_nome, pol_numero) VALUES ('$nome', '$numero')");
  header('location: politico.html')
  

?>