<main id="mainPerfil">
    <div id="apresentacao">

        <div>
            <svg id="iconUser" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
        </div>

        <h4>Olá!</h4>
    </div>

    <section>
        <h1>Dados pessoais</h1>
        <div id="dadosPessoais">
            <div id="infoPessoais">
                <div id="infoPessoais1">
                    <label for="nome">Nome: <?= $userData['nome'] ?></label><br>
                    <label for="nome_mae">Nome da Mãe: <?= $userData['nome_mae'] ?></label><br>
                    <label for="datanasci">Data de nascimento: <?= $userData['nascimento'] ?></label><br>
                    <label for="sexo">Sexo: <?= $userData['sexo'] ?></label><br>
                    <label for="cpf">CPF: <?= $userData['CPF'] ?></label><br>
                    <label for="tel_fixo">Telefone fixo: <?= $userData['fixo'] ?></label><br>
                    <label for="tel_cel">Telefone celular: <?= $userData['celular'] ?></label><br>
                </div>
                <div id="infoPessoais2">
                    <label for="email">E-mail: <?= $userData['email'] ?></label><br><br>
                    <button id="alterar_senha" class="btn btn-secondary">Alterar senha</button>
                </div>
            </div><br><br>

            <div id="endereco">
                <div id="endereco1">
                    <label for="CEP">CEP: <?= $userData['CEP'] ?></label><br>
                    <label>UF: <?= $userData['UF'] ?></label><br>
                    <label>Cidade: <?= $userData['cidade'] ?></label><br>
                    <label for="bairro">Bairro: <?= $userData['bairro'] ?></label><br>

                </div>
                <div>
                    <label for="rua">Rua</label><br>
                    <label for="numero_entrada">Número: <?= $userData['numero'] ?></label><br>
                    <?php if (!empty($userData['complemento'])) : ?>
                        <label for="complemento">Complemento: <?= $userData['complemento'] ?></label><br>
                    <?php endif; ?>
                </div>
            </div>
        </div><br>

        <h1>Planos adiquiridos</h1>
        <div id="planosObtidos">
            <?php if ($numeroPedidos != "0") : ?>
                <?php foreach ($findPedidos as $pedido) : ?>
                    <div id="containerPlanoPerfil">
                        <div>
                            <h5>Nome do Plano</h5><br>
                            <p><?= $pedido->id ?></p>
                        </div>
                        <div>
                            <h5>Data</h5><br>
                            <p><?= $pedido->created_at ?></p>
                        </div>
                        <div>
                            <h5>Valor/mês</h5><br>
                            <p><?= $pedido->valor ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <h2 id="textvazio" class="carrinhoVazio">Você não tem pedidos registrados.</h2><br>
            <?php endif; ?>
        </div>
    </section>
</main>