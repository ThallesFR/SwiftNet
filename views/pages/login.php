<title> <?php echo $title ?></title>
<main id="mainLogin">
    <img id="banner_login" src="<?php echo  generateUrl('/public/images/banners/banner login 1.svg')?>" alt="">

    <form id="form_login" method="POST" action="login-fgdfgr546-auth">

        <img id="logo_login_login" src="<?php echo  generateUrl('/public/images/logos/swiftnet branco logo.svg')?>" alt=""><br>

        <input id="input_login" name="usuario_login" placeholder="Login" type="text" maxlength="10"><br>
        <input id="input_senha_login" name="senha" placeholder="Senha" type="password" maxlength="15"><br>
        <a id="btn_cadastro" href="http://localhost/SwiftNet/cadastro"> Não possui conta ? Cadastre-se aqui.</a><br>

        <button id="btn_login" type="submit"> Login </button><br>
    </form>
</main>

