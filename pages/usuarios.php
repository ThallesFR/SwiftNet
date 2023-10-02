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
  
    <?php require_once '../mock/usuarios.php'; ?>

    <main id="usuariosMain">
        <div id="usuarios">
            <?php if (count($usuarios) > 0) : ?>
                <div id="containerUsuario">
                        <div class="camposListaUsers">
                            <h5 >Usuário</h5><br>
                            
                        </div>
                        <div class="camposListaUsers">
                            <h5>Plano</h5><br>
                            
                        </div>
                        <div class="camposListaUsers">
                            <h5>Valor/mês</h5><br>
                            
                        </div>
                        <div class="camposListaUsers">
                            <h5>Data</h5><br>
                            
                        </div>
                        <div class="camposListaUsers">
                            <h5>Deletar</h5><br>
                            
                        </div>
                       
                </div>
                <?php foreach ($usuarios as $usuario) : ?>
                    <div id="listaUsuarios">
                        <p class="camposListaUsers"><?= $usuario['nome'] ?></p>
                        <p class="camposListaUsers"><?= $usuario['plano'] ?></p>
                        <p class="camposListaUsers"><?= $usuario['valor'] ?></p>
                        <p class="camposListaUsers"><?= $usuario['data'] ?></p>

                        <div class="camposListaUsers">
                            <button id="deleteLixeira" onclick="">
                                <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                             </button>
                        </div>
                    </div>
                   
                <?php endforeach; ?>
            <?php else : ?>
                <h2 id="textvazio" class="carrinhoVazio">Você não tem usuários registrados.</h2><br>
            <?php endif; ?>
        </div>
    </main>

    <?php require_once '../components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="../js/navbar.js"></script>

</body>
</html>