<?php
  include("config.php");

  extract($_POST);
  $sql = "INSERT INTO tb_promessas (pro_tema, pro_descricao, pro_data, pro_cumprida, pro_pol_codigo) VALUES ('$tema', '$descricao', '$data', ".(isset($cumprida) ? "1" : "0") .", '$politico')";
  $consulta = $conexao->query($sql);
  
  header('location: promessa.php')
?>