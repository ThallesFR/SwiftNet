<?php
if (session_status() == PHP_SESSION_NONE) {
    // Se a sessão ainda não estiver iniciada, inicie-a
    session_start();
}

if (isset($_SESSION['tipo'])) {
    // A variável $_SESSION['tipo'] existe, você pode acessá-la
    $tipo = $_SESSION['tipo'];
}
?>

<header>
    <a class="bp" id="logoHeader" href="http://localhost/SwiftNet/"><img src="<?php echo  generateUrl('/public/images/logos/logo.svg') ?>"> SwiftNet</a>

    <nav id="nav">

        <?php if (!isset($tipo)) : ?>
            <a href="http://localhost/SwiftNet/login" id="loginNav">Login</a>
        <?php endif ?>

        <?php if (isset($tipo)) : ?>
            <div id="perfilDiv">

                <a href="http://localhost/SwiftNet/perfil">
                    <div> Perfil</div>
                    <svg id="iconUserHeader" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </a>
            </div>
        <?php endif ?>

        <ul id="menu" role="menu">
            <?php if (!isset($tipo) || $tipo == 'comum') : ?>
                <li><a href="http://localhost/SwiftNet/planos">Planos</a></li>
                <li><a href="http://localhost/SwiftNet/sobre-nos">Sobre Nós</a></li>
            <?php endif ?>

            <?php if (isset($tipo) && $tipo == 'master') : ?>
                <li><a href="http://localhost/SwiftNet/usuarios">Usuários</a></li>
                <li><a href="http://localhost/SwiftNet/modelo-do-banco">Modelo BD </a></li>
            <?php endif ?>

            <?php if (isset($tipo)) : ?>
                <a id="a_logout" href="http://localhost/SwiftNet/login-logout">
                    Sair
                </a>
            <?php endif ?>

        </ul>
        <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
            <span id="hamburger"></span>
        </button>
    </nav>
</header>

<script src="<?php echo  generateUrl('/public/js/navbar.js') ?>"></script>