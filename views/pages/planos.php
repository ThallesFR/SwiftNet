<title><?php echo $title ?></title>
<main id="planosMain">

    <h1 id="fibraPlanos">Fibra
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-router" viewBox="0 0 16 16">
            <path d="M5.525 3.025a3.5 3.5 0 0 1 4.95 0 .5.5 0 1 0 .707-.707 4.5 4.5 0 0 0-6.364 0 .5.5 0 0 0 .707.707Z" />
            <path d="M6.94 4.44a1.5 1.5 0 0 1 2.12 0 .5.5 0 0 0 .708-.708 2.5 2.5 0 0 0-3.536 0 .5.5 0 0 0 .707.707ZM2.5 11a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm4.5-.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2.5.5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm1.5-.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Z" />
            <path d="M2.974 2.342a.5.5 0 1 0-.948.316L3.806 8H1.5A1.5 1.5 0 0 0 0 9.5v2A1.5 1.5 0 0 0 1.5 13H2a.5.5 0 0 0 .5.5h2A.5.5 0 0 0 5 13h6a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5h.5a1.5 1.5 0 0 0 1.5-1.5v-2A1.5 1.5 0 0 0 14.5 8h-2.306l1.78-5.342a.5.5 0 1 0-.948-.316L11.14 8H4.86L2.974 2.342ZM14.5 9a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h13Z" />
            <path d="M8.5 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z" />
        </svg>
    </h1><br>
    <div class="containerTiposPlanos">
        <?php foreach ($planos as $plano) : ?>
            <?php if($plano["planos_tipo"] == "banda"):?>

                <?php $velocidade_plano = null;
                    foreach ($velocidade as $elemento_velocidade) {
                        if ($elemento_velocidade['id_velocidade'] == $plano['planos_velocidade']) {
                            $velocidade_plano= $elemento_velocidade['velocidade_quantidade'];
                            break;
                        }
                    }?>



                <div class="containerPlanos">

                    <h3><?= $plano['planos_nome'] ?></h3>

                    <h2><?= $velocidade_plano ?></h2>

                    <p class="descricaoPlano"> <?= $plano['planos_descricao'] ?></p>

                    <h2><?="R$" . number_format($plano['planos_valor'], 2, ',', '.')?></h2><br>

                    <div class="contratarPlano">
                        <button>Contratar</button>
                    </div><br>

                    <p class="descricaoPlano"><button type="button" onclick="trocaDisplay('<?= $plano['id_planos']?>')">+ detalhes da oferta</button></p>
                    
                </div><br>

                <div class=" invisivel" id="<?= $plano['id_planos']?>">
                    <div id="card_detalhes_planos">
                        <div id="card_detalhes_planos_div">
                        <button class="fechar_detalhes_planos" type="button" onclick="trocaDisplay('<?= $plano['id_planos']?>')">
                            <h4>X</h4>
                        </button>

                        <h2>Detalhes do plano:</h2><br>
                            <p>
                                <?= $plano['planos_detalhes']?>
                            </p>
                        </div>
                    </div>
                    
                </div>
            <?php endif?>
        <?php endforeach; ?>
    </div>

    <h1 id="fixoPlanos">Fíxo
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
        </svg>
    </h1><br>
    <div class="containerTiposPlanos">
        <?php foreach ($planos as $plano) : ?>
            <?php if($plano["planos_tipo"] == "fixo"):?>

                
                <?php $fminutos_plano = null;
                    foreach ($F_minutos as $elemento_fminutos) {
                        if ($elemento_fminutos['id_franquia_minutos'] == $plano['planos_fminutos']) {
                            $fminutos_plano= $elemento_fminutos['franquia_minutos_quantidade'];
                            break;
                        }
                    }?>

                <div class="containerPlanos">

                    <h3><?= $plano['planos_nome'] ?></h3>

                    <h2><?= $fminutos_plano ?></h2>

                    <p class="descricaoPlano"><?= $plano['planos_descricao'] ?></p>

                    <h2><?="R$" . number_format($plano['planos_valor'], 2, ',', '.')?></h2><br>

                    <div class="contratarPlano">
                        <button>Contratar</button>
                    </div><br>

                    <p class="descricaoPlano"><button type="button" onclick="trocaDisplay('<?= $plano['id_planos']?>')">+ detalhes da oferta</button></p>
                    
                </div><br>

                <div class=" invisivel" id="<?= $plano['id_planos']?>">
                    <div id="card_detalhes_planos">
                        <div id="card_detalhes_planos_div">
                        <button class="fechar_detalhes_planos" type="button" onclick="trocaDisplay('<?= $plano['id_planos']?>')">
                            <h4>X</h4>
                        </button>

                        <h2>Detalhes do plano:</h2><br>
                            <p>
                                <?= $plano['planos_detalhes']?>
                            </p>
                        </div>
                    </div>
                    
                </div>
            <?php endif?>
        <?php endforeach; ?>
    </div>

    <h1 id="movelPlanos">Móvel
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-phone-flip" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11 1H5a1 1 0 0 0-1 1v6a.5.5 0 0 1-1 0V2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v6a.5.5 0 0 1-1 0V2a1 1 0 0 0-1-1Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-2a.5.5 0 0 0-1 0v2a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-2a.5.5 0 0 0-1 0v2ZM1.713 7.954a.5.5 0 1 0-.419-.908c-.347.16-.654.348-.882.57C.184 7.842 0 8.139 0 8.5c0 .546.408.94.823 1.201.44.278 1.043.51 1.745.696C3.978 10.773 5.898 11 8 11c.099 0 .197 0 .294-.002l-1.148 1.148a.5.5 0 0 0 .708.708l2-2a.5.5 0 0 0 0-.708l-2-2a.5.5 0 1 0-.708.708l1.145 1.144L8 10c-2.04 0-3.87-.221-5.174-.569-.656-.175-1.151-.374-1.47-.575C1.012 8.639 1 8.506 1 8.5c0-.003 0-.059.112-.17.115-.112.31-.242.6-.376Zm12.993-.908a.5.5 0 0 0-.419.908c.292.134.486.264.6.377.113.11.113.166.113.169 0 .003 0 .065-.13.187-.132.122-.352.26-.677.4-.645.28-1.596.523-2.763.687a.5.5 0 0 0 .14.99c1.212-.17 2.26-.43 3.02-.758.38-.164.713-.357.96-.587.246-.229.45-.537.45-.919 0-.362-.184-.66-.412-.883-.228-.223-.535-.411-.882-.571ZM7.5 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1Z" />
        </svg>
    </h1><br>
    <div class="containerTiposPlanos">
        <?php foreach ($planos as $plano) : ?>
            <?php if($plano["planos_tipo"] == "móvel"):?>
                 
                <?php 
                    $fminutos_plano = null;
                    foreach ($F_minutos as $elemento_fminutos) {
                        if ($elemento_fminutos['id_franquia_minutos'] == $plano['planos_fminutos']) {
                            $fminutos_plano= $elemento_fminutos['franquia_minutos_quantidade'];
                            break;
                        }
                    }

                    $fdados_plano = null;
                    foreach ($F_Dados as $elemento_fdados) {
                        if ($elemento_fdados['id_franquia_dados'] == $plano['planos_fdados']) {
                            $fdados_plano= $elemento_fdados['franquia_dados_quantidade'];
                            break;
                        }
                    }
                    
                    ?>

                <div class="containerPlanos">

                    <h3><?= $plano['planos_nome'] ?></h3>

                    <h2><?=   $fdados_plano ?></h2>

                    <h3><?= $fminutos_plano ?></h3>

                    <p class="descricaoPlano"><?= $plano['planos_descricao'] ?></p>

                    <h2><?="R$" . number_format($plano['planos_valor'], 2, ',', '.')?></h2><br>

                    <div class="contratarPlano">
                        <button>Contratar</button>
                    </div><br>

                    <p class="descricaoPlano"><button type="button" onclick="trocaDisplay('<?= $plano['id_planos']?>')">+ detalhes da oferta</button></p>
                    
                </div><br>

                <div class=" invisivel" id="<?= $plano['id_planos']?>">
                    <div id="card_detalhes_planos">
                        <div id="card_detalhes_planos_div">
                        <button class="fechar_detalhes_planos" type="button" onclick="trocaDisplay('<?= $plano['id_planos']?>')">
                            <h4>X</h4>
                        </button>

                        <h2>Detalhes do plano:</h2><br>
                            <p>
                                <?= $plano['planos_detalhes']?>
                            </p>
                        </div>
                    </div>
                    
                </div>
            <?php endif?>
        <?php endforeach; ?>
    </div>
</main>
<script src="<?php echo  generateUrl('/public/js/invisivel.js') ?>"></script>