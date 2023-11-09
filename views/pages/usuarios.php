<title><?php echo $title ?></title>
<main id="usuariosMain">
    <div id="usuarios">
        <?php if (count($usuarios) > 0) : ?>
            <div id="containerUsuario">
                <h5 class="camposListaUsers">Usuário</h5><br>
                <h5 class="camposListaUsers">Plano</h5><br>
                <h5 class="camposListaUsers">Valor/mês</h5><br>
                <h5 class="camposListaUsers">Vencimento</h5><br>
                <h5 class="camposListaUsers">Ações</h5><br>
            </div>

                <!---------------------------------------------------------lista de usuários ---------------------------------------------------------->
        <?php foreach ($usuarios as $usuario) : ?>
            <?php if ($usuario['usuario_tipo'] === 'comum') : ?>

                    <?php $id_user = $usuario['id_usuario']; ?>

                    <?php
                    $contrato = null;
                    foreach ($contratos as $elemento_contrato) {
                        if ($elemento_contrato['contratos_user'] == $id_user) {
                            $contrato = $elemento_contrato;
                            break;
                        }
                    }

                    if ($contrato === null) {
                        $contrato = [
                            'contratos_nome' => 'inesistente',
                            'contratos_valor' => '00',
                            'contratos_vigencia' => '-- --'
                        ];
                    }
                    ?>

                    <div id="listaUsuarios">
                        <p class="camposListaUsers"><?= $usuario['usuario_nome'] ?></p>
                        <p class="camposListaUsers"><?= $contrato['contratos_nome'] ?></p>
                        <p class="camposListaUsers"><?= "R$" . number_format($contrato['contratos_valor'], 2, ',', '.') ?></p>
                        <p class="camposListaUsers">
                            <?php
                            if ($contrato['contratos_vigencia'] != "-- --") {
                                echo date("d/m/Y", strtotime($contrato['contratos_vigencia']));
                            } else {
                                echo $contrato['contratos_vigencia'];
                            }
                            ?>
                        </p>

                        <div id="botoes_list_users">
                            <button class="detalhes_user" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" onclick="trocaDisplay('<?= $id_user ?>')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </button>
                            <a class="deleteLixeira" onclick="trocaDisplay('alert_user<?= $id_user ?>')">
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
                        <p>Nome: <?= $usuario['usuario_nome'] ?></p>
                        <p>Data de Nascimento: <?= $usuario['usuario_nascimento'] ?></p>
                        <p>CPF: <?= $usuario['usuario_cpf'] ?></p>
                        <p>CEP: <?= $usuario['usuario_cep'] ?></p>
                        <p>Email: <?= $usuario['usuario_email'] ?></p><br>


                        <!------------------ logs ------------------->
                        <h3 id="h3_logs">Logs:</h3>
                        <div id="logs_users">
                            <?php
                            $exibiu_algo = false;

                            foreach ($logs as $elemento_log) {
                                if ($elemento_log['log_user'] == $id_user) {
                                    foreach ($perguntas as $elemento_pergunta) {
                                        if ($elemento_pergunta['id_2fa'] == $elemento_log["log_2fa"]) {
                                            $pergunta = $elemento_pergunta;
                                            $exibiu_algo = true;

                                            echo '<div id="cards_log">';
                                                echo '<div id="cards_log_login_logout">';
                                                    echo '<h6>Login: ' . $elemento_log['log_login'] . '</h6>';
                                                    echo '<h6>Logout: ' . $elemento_log['log_logout'] . '</h6>';
                                                echo '</div>';
                                                echo '<p>Autenticação: ' . $pergunta['2fa_quest'] . '</p>';
                                            echo '</div>';
                                        }
                                    }
                                }
                            }

                            if (!$exibiu_algo) {
                                echo "Inexistente";
                            }
                            ?>
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
