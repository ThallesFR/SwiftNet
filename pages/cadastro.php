<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <title>SwiftNet</title>
</head>

<body id="body_cadastro">

    <?php require_once '../components/header.php'; ?>

    <main id="main_cadastro">

        <img id="banner_cadastro" src="../images/banners/banner login 1.svg" alt="">

        <form action="" method="post" name=cadastro id="cadastro_form">

            <h3>
                <div id="div_info_cadastro">
                    <button id="button_info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square-fill" viewBox="0 0 16 16">
                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>
                    </button>

                    <div id="div_card_info_cadastro" style="min-height: 120px;">
                        <div class="collapse collapse-horizontal" id="collapseWidthExample">
                            <div id="card_info_cadastro" class="card card-body" style="width: 300px;">
                                – Campos nome, Data de Nascimento, Sexo, Nome Materno, CPF, Telefone Celular,
                                Telefone Fixo, Endereço Completo, Login e Senha devem ser preenchidos. <br>
                                – O campo nome deve ter no mínimo 15 caracteres e no máximo 80 caracteres alfabéticos. <br>
                                – Os campos Telefone Celular e Telefone Fixo devem ter os seguintes formatos (+55)XX-XXXXXXXX. <br>
                                – O campo Login deve ter exatamente 6 caracteres alfabéticos. <br>
                                – O campo Senha deve ter 8 caracteres alfabéticos. <br>
                                – Os campos Senha e Confirma Senha devem ser iguais. <br>
                            </div>
                        </div>
                    </div>
                </div>
                Cadastro de usuário
            </h3> <br>
            <div class="container" name="campos_cadastro" id="campos_cadastro">

                <div id="div1_cadastro">
                    <input class="campos_obrigatorios" type="text" id="nome" name="nome" placeholder="Nome completo"> <br>

                    <input class="campos_obrigatorios" type="text" id="nomemae" name="nomemae" placeholder="Nome da mãe completo"><br>

                    <div id="div_data">

                        <label>Data de Nascimento:</label><br>

                        <input class="campos_obrigatorios" type="date" id="datanasci" name="datanasci"><br>

                    </div>


                    <div id="sexo_div">
                        <label id="titulo_sexo" type="text">Sexo: </label><br>
                        <div id="campus_sexo"><input class="radio" type="radio" name="sexo" value="Feminino">
                            <label for="feminino">Feminino</label>

                            <input class="radio" type="radio" name="sexo" value="Masculino">
                            <label for="masculino">Masculino</label>

                            <input class="radio" type="radio" name="sexo" value="Outros">
                            <label for="outros">Outros</label><br><br>
                        </div>

                    </div>



                    <input class="campos_obrigatorios" type="text" id="cpf" name="cpf" autocomplete="oof" placeholder="CPF"><br>

                    <input class="campos_obrigatorios" type="text" id="email" name="email" placeholder="Email"><br>

                    <input class="campos_obrigatorios" type="text" name="login" id="login" placeholder="Login"><br>

                    <input class="campos_obrigatorios" type="password" name="senha" id="senha" placeholder="Senha"><br>

                    <input class="campos_obrigatorios" type="password" name="confsenha" id="confsenha" placeholder="Conirme sua senha"><br>

                </div>

                <div id="div2_cadastro">

                    <input class="campos_obrigatorios" type="tel" name="tel_fixo" id="tel_fixo" placeholder="Tel. Fixo "><br>

                    <input class="campos_obrigatorios" type="tel" name="tel_cel" id="tel_cel" placeholder="Tel. Celular"><br>

                    <input class="campos_obrigatorios" type="text" id="CEP" name="CEP" size="10" placeholder="CEP" onblur="pesquisacep(this.value);"><br>

                    <div id="div_uf">
                        <label for="UF">UF:</label><br>
                        <select class="campos_obrigatorios" id="UF" name="UF">
                            <option value="">Selecione</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MS">MS</option>
                            <option value="MT">MT</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select><br><br><br>
                    </div>


                    <input class="campos_obrigatorios" type="text" id="cidade" name="cidade" placeholder="Cidade"><br>

                    <input class="campos_obrigatorios" type="text" id="bairro" name="bairro" placeholder="Bairro"><br>

                    <input class="campos_obrigatorios" name="rua" id="rua" placeholder="Rua"></input><br>

                    <input class="campos_obrigatorios" type="text" id="numero_entrada" name="numero_entrada" placeholder="Número"><br>

                    <input type="text" id="complemento" name="complemento" placeholder="Complemento"><br>


                </div><br>

            </div>


            <div id="div_botoes_cadastro">
                <button class="btn btn-success" type="submit" name='botaocadastrar' id='botaocadastrar'>Cadastrar</button>
                <button class="btn btn-light" name='botaolimpar' id='botaolimpar' type="reset">Limpar</button>
            </div>


        </form>

    </main>

    <?php require_once '../components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="../js/navbar.js"></script>
    <script src="../js/cadastro.js"></script>

</body>

</html>