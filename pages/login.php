<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <title>SwiftNet</title>
</head>

<body>

    <?php require_once '../components/header.php'; ?>

    <main id="mainLogin">
        <img id="banner_login" src="../images/banners/banner login 1.svg" alt="">

        <form id="form_login" action="">

            <img id="logo_login_login" src="../images/logos/swiftnet branco logo.svg" alt=""><br>

            <input id="input_login" placeholder="Login" type="text"><br>
            <input id="input_senha_login" placeholder="Senha" type="text"><br>
            <a id="btn_cadastro" href="cadastro.php"> Não possui conta ? Cadastre-se aqui.</a><br>

            <button id="btn_login" type="submit"> Login </button><br>



        </form>

        
    </main>

    <?php require_once '../components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="../js/navbar.js"></script>

</body>

</html>