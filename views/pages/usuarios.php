<title><?php echo $title ?></title>
<main id="usuariosMain">

    <form id="form_pesquisa_usuario" method="post" action="usuarios">
        <div>
            <input id="input_pesquisa_usuario" name="busca" value="<?php if (isset($_POST['busca'])) echo $_POST['busca']; ?>" placeholder="Digite o nome do usuário" type="text">
            <button id="button_pesquisa_usuario" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </div>

        <a href="usuarios-gerar-pdf" title="Gerar um PDF de todos os usuários." class="pdf_user">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
            </svg>
        </a>
    </form>

    <div id="usuarios">
        <?php
        $tipo_comum = 0;
        foreach ($usuarios as $usuario) {
            if ($usuario['usuario_tipo'] === 'comum') {
                $tipo_comum++;
            }
        }

        if ($tipo_comum > 0) : ?>

            <div id="containerUsuario">
                <h5 class="camposListaUsers">Nome</h5><br>
                <h5 class="camposListaUsers">CPF</h5><br>
                <h5 class="camposListaUsers">Email</h5><br>
                <h5 class="camposListaUsers">Ações</h5><br>
            </div>

            <!---------------------------------------------------------lista de usuários ---------------------------------------------------------->
            <?php foreach ($usuarios as $usuario) :

                if ($usuario['usuario_tipo'] === 'comum') :

                    $id_user = $usuario['id_usuario']; ?>

                    <div id="listaUsuarios">
                        <p class="camposListaUsers"><?= $usuario['usuario_nome'] ?></p>
                        <p class="camposListaUsers"><?= $usuario['usuario_cpf'] ?></p>
                        <p class="camposListaUsers"><?= $usuario['usuario_email'] ?></p>

                        <div id="botoes_list_users">
                            <button title="Detalhes do usuário" class="detalhes_user" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" onclick="trocaDisplay('<?= $id_user ?>')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                </svg>
                            </button>
                            <a title="Deletar usuário" class="deleteLixeira" onclick="trocaDisplay('alert_user<?= $id_user ?>')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg>
                            </a>

                        </div>

                        <!--------------------alerta de exclusão ----------------------------------------------------------->
                        <div id="alert_user<?= $id_user ?>" class="invisivel">
                            <div class="div_delete_user">
                                <div class="div_delete_user_div">
                                    <h3>Deseja excluir o usuário <?= $usuario['usuario_nome'] ?> permanentemente?</h3><br>
                                    <div>
                                        <a href='usuarios/sgdohiqergh849dfjhf-delete/<?= $id_user; ?>' class="btn btn-success">Sim</a>
                                        <button onclick="trocaDisplay('alert_user<?= $id_user ?>')" class="btn btn-danger">Não</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>

    <!---------------------------------- detalhes dos usuários  --------------------------------------->
    <div id="<?= $id_user ?>" class="invisivel">
        <div id="card_detalhes_users" class="card_detalhes_users">
            <button class="fechar_detalhes_user" type="button" onclick="trocaDisplay('<?= $id_user ?>')">
                <h4>X</h4>
            </button>
            <div id="card_detalhes_users_div">
                <h2>Detalhes do usuário</h2><br><br>

                <!------------------ contratos ------------------->
                <h3>Contratos:</h3>
                <div id="detalhes_card_contratos">
                    <ul id="detalhes_card_contratos_title" class="list-group list-group-horizontal">
                        <li id="detalhes_card_contratos_plano" class="list-group-item">Plano</li>
                        <li id="detalhes_card_contratos_vigen" class="list-group-item">Vigência</li>
                        <li id="detalhes_card_contratos_valor" class="list-group-item">Valor mensal</li>
                    </ul>

                    <?php foreach ($contratos as $contrato) :
                        $contratos_encontrados = false;

                        if ($contrato['contratos_user'] == $id_user) :
                            $contratos_encontrados = true; ?>

                            <ul id="detalhes_card_contratos_texto" class="list-group list-group-horizontal">
                                <li id="detalhes_card_contratos_plano" class="list-group-item"><?= $contrato['contratos_nome'] ?></li>
                                <li id="detalhes_card_contratos_vigen" class="list-group-item"><?= date("d/m/Y ", strtotime($contrato['contratos_vigencia'])) ?></li>
                                <li id="detalhes_card_contratos_valor" class="list-group-item"><?= "R$" . number_format($contrato['contratos_valor'], 2, ',', '.') ?></li>
                            </ul>
                    <?php endif;
                    endforeach;
                    if (!$contratos_encontrados) {
                        echo "<p>Nenhum contrato encontrado.</p>";
                    } ?>
                </div>

                <!------------------ logs ------------------->
                <h3>Logs:</h3><br>
                <div id="logs_users">
                    <?php foreach ($logs as $elemento_log) :
                        $logs_encontrados = false;

                        if ($elemento_log['log_user'] == $id_user) :
                            $logs_encontrados = true; ?>

                            <div id="cards_log">
                                <p>Tipo: <?= $elemento_log['log_tipo']; ?></p>
                                <p><?php
                                    if ($elemento_log['log_2fa'] != '') {
                                        echo "Autenticação: " . $elemento_log['log_2fa'];
                                    }; ?></p>
                                <p>Data/hora: <?= date("d/m/Y H:i:s", strtotime($elemento_log['log_data'])) ?></p>
                            </div>

                    <?php endif;
                    endforeach;

                    if (!$logs_encontrados) {
                        echo "<p>Nenhum log encontrado.</p>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php endforeach; ?>
<?php else : ?>
    <h2 id="textvazio" class="carrinhoVazio">Você não tem usuários registrados.</h2><br>
<?php endif; ?>

</div>
</main>