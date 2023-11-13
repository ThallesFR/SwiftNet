<title><?php echo $title ?></title>
<main id="mainPerfil">
    <div id="apresentacao">

        <div>
            <svg id="iconUser" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
        </div>

        <h4>Olá, <?= $userData['usuario_nome'] ?>!</h4>
    </div>

    <section>
        <h1>Dados pessoais </h1>
        <div id="dadosPessoais">
            <div id="infoPessoais">
                <div id="infoPessoais1">
                    <label for="nome">Nome: <?= $userData['usuario_nome'] ?></label><br>
                    <label for="nome_mae">Nome da Mãe: <?= $userData['usuario_mae'] ?></label><br>
                    <label for="datanasci">Data de nascimento: <?= date("d/m/Y ", strtotime($userData['usuario_nascimento'])) ?></label><br>
                    <label for="sexo">Sexo: <?= $userData['usuario_sexo'] ?></label><br>
                    <label for="cpf">CPF: <?= $userData['usuario_cpf'] ?></label><br>
                    <label for="tel_fixo">Telefone fixo: <?= $userData['usuario_telefone'] ?></label><br>
                    <label for="tel_cel">Telefone celular: <?= $userData['usuario_cel'] ?></label><br>
                </div>
                <div id="infoPessoais2">
                    <label for="email">E-mail: <?= $userData['usuario_email'] ?></label><br><br>
                    <button id="alterar_senha" class="btn btn-secondary" onclick="trocaDisplay('alterar_senha_div')">Alterar senha</button>
                </div>
            </div><br><br>

            <div id="endereco">
                <div id="endereco1">
                    <label for="CEP">CEP: <?= $userData['usuario_cep'] ?></label><br>
                    <label>UF: <?= $userData['usuario_uf'] ?></label><br>
                    <label>Cidade: <?= $userData['usuario_cidade'] ?></label><br>
                    <label for="bairro">Bairro: <?= $userData['usuario_bairro'] ?></label><br>

                </div>
                <div>
                    <label for="rua">Rua: <?= $userData['usuario_rua']?> </label><br>
                    <label for="numero_entrada">Número: <?= $userData['usuario_numero'] ?></label><br>
                    <?php if (!empty($userData['usuario_complemento'])) : ?>
                        <label for="complemento">Complemento: <?= $userData['usuario_complemento'] ?></label><br>
                    <?php endif; ?>
                </div>
            </div>
        </div><br>

        <div id="alterar_senha_div" class="invisivel">
            <div id="div_edit_senha">
                <div id="div_edit_senha_div">

                    <button id="div_edit_senha_div_fechar" onclick="trocaDisplay('alterar_senha_div')">X</button><br>
                    
                    <h3>Altere sua senha:</h3>

                    <form action="perfil-editar-senha48reg84erg" method="post">
                        <input class="input_alterar_senha" id="nova_senha" type="password" placeholder="Nova senha"><br>
                        <span  class="span_alterar_senha" id="span_senha"></span><br><br>

                        <input class="input_alterar_senha" id="conf_nova_senha" name="usuario_senha" type="password" placeholder="Confirme a nova senha"><br>
                        <span  class="span_alterar_senha" id="span_confSenha"></span><br><br>

                        <button id="alterar_senha_button" type="submit" class="btn btn-success">Alterar</button>
                    </form>


                </div>
            </div>
        </div>

        <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'comum') : ?>
            <h1>Planos adiquiridos</h1>
            <div id="planosObtidos">
                <?php if ($contratos != false) : ?>
                    <?php foreach ($contratos as $contrato) : ?>
                        <div id="containerPlanoPerfil">
                            <div>
                                <h5>Nome do Plano</h5><br>
                                <p><?= $contrato['contratos_nome'] ?></p>
                            </div>
                            <div>
                                <h5>Tipo do Plano</h5><br>
                                <p><?= $contrato['contratos_tipo'] ?></p>
                            </div>
                            <div>
                                <h5>Vigência</h5><br>
                                <p><?= date("d/m/Y ", strtotime($contrato['contratos_vigencia'])) ?></p>
                            </div>
                            <div>
                                <h5>Valor/mês</h5><br>
                                <p><?= "R$" . number_format($contrato['contratos_valor'], 2, ',', '.')?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <h2 id="textvazio" class="carrinhoVazio">Você não tem planos registrados.</h2><br>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </section>
</main>
<script src="<?php echo  generateUrl('/public/js/validate_edite_senha.js'); ?>"></script>