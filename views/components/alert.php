<?php 
// Verifica se o cookie está presente
    if (isset($_COOKIE['alerta'])) :?>
       
      <?php 
        $tipo = $_COOKIE['alerta'];// Exibe a mensagem 
        $mensagem1Cookie = $_COOKIE['mensagem1'];// Exibe a mensagem 
        $mensagem2Cookie = $_COOKIE['mensagem2'];// Exibe a mensagem 

        setcookie('alerta', '', time() - 3600, '/');// Remove o cookie
        setcookie('mensagem1', '', time() - 3600, '/');// Remove o cookie
        setcookie('mensagem2', '', time() - 3600, '/');// Remove o cookie
        ?>
      
      <div id="alertas" class="alert alert-<?=$tipo?> alert-dismissible fade show fixed-top " role="alert">
        <strong id="alertas_titulo"><?=$mensagem1Cookie?></strong> <h6 id="alertas_text"><?=$mensagem2Cookie?></h6>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  <?php endif; ?>

