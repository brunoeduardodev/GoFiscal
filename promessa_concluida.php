<?php
  include("config.php");

  extract($_GET);

  $sql = "SELECT * FROM tb_promessas WHERE PRO_CODIGO = $codigo";
  $consulta = $conexao->query($sql);

  $politico = $consulta->fetch_assoc()['pro_pol_codigo'];

  $sql = "UPDATE tb_promessas SET PRO_CUMPRIDA=1 WHERE PRO_CODIGO = $codigo";
  $consulta = $conexao->query($sql);
  //echo $sql;
  header('location: estatisticas.php?politico='.$politico);
?>