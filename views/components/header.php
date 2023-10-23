<header>
    <a class="bp" id="logoHeader" href="index.php"><img src="<?php echo  generateUrl('/public/images/logos/logo.svg')?>"> SwiftNet</a>

    <nav id="nav">
      
        <ul id="menu" role="menu">
            <li><a href="planos">Planos</a></li>
            <li><a href="usuarios">Usuários</a></li>
            <li><a href="sobreNos">Sobre Nós</a></li>
            <li><a href="modeloBD">Modelo BD </a></li>
        </ul>

        <a href="login"  id="loginNav">Login</a>

        <div id="perfilDiv">
            
            <a href="perfil.php">
                <div> Perfil</div>
                <svg id="iconUserHeader" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </a>

        </div>
        
        <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
            <span id="hamburger"></span>
        </button>
    </nav>
</header>