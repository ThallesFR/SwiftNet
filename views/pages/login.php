<title> <?php echo $title ?></title>
<main id="mainLogin">
    <img id="banner_login" src="<?php echo  generateUrl('/public/images/banners/banner login 1.svg') ?>" alt="">

    <form id="form_login" method="POST" action="login-fgdfgr546-auth">

        <img id="logo_login_login" src="<?php echo  generateUrl('/public/images/logos/swiftnet branco logo.svg') ?>" alt=""><br>

        <input class="mainLogin_input" id="input_login" name="usuario_login" placeholder="Login" type="text" maxlength="6"><br>
        <input class="mainLogin_input" id="input_senha_login" name="senha" placeholder="Senha" type="password" maxlength="8"><br>

        <div id="statusContainer">
            <a id="statusMessage" href="http://localhost/SwiftNet/cadastro">Não possui conta ? Cadastre-se aqui</a>
        </div><br>


        <div id="div_check_login">
            <h6>Tipo de usuário:</h6>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="master">
                <label class="form-check-label" for="flexRadioDefault1">
                    Master
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="comum" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Comum
                </label>
            </div>
        </div>   
        <button id="btn_login" type="submit"> Login </button><br>
    </form>
</main>
<script src="<?php echo  generateUrl('/public/js/radio_login.js'); ?>"></script>