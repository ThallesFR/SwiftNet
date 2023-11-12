<?php

class Core
{
    public function run($routes)
    {
        $url = '/';// Inicializa a URL com "/" como valor padrão.

        isset($_GET['url']) ? $url .= $_GET['url'] : '';// Verifica se há um parâmetro "url" na consulta GET e, se houver, concatena na URL.

        ($url !='/') ? $url = rtrim($url,'/'): $url; // Se a URL não for "/", remove a barra final.

        $routerFound = false;// Inicializa uma variável para rastrear se um roteador foi encontrado.

        foreach($routes as $path => $controller) {  // Percorre as rotas definidas no array $routes.

            $pattern = '#^'.preg_replace('/{id}/','(\w+)',$path).'$#';  // Cria um padrão de expressão regular para o caminho da rota,
                                                                        // substituindo "{id}" por "(\w+)" para capturar um segmento variável.

            if (preg_match($pattern,$url,$matches)){// Verifica se o padrão de URL corresponde à URL atual.
                array_shift($matches); // Remove o primeiro elemento de $matches (que é a URL completa).

                $routerFound= true;  // Marca que um roteador foi encontrado.

                [$currentController, $action] = explode('@',$controller); // Divide a string do controlador e da ação.

                require_once __DIR__."/../app/controllers/$currentController.php"; // Chama o arquivo do controlador correspondente.

                $newController = new $currentController();// Instancia o controlador.
                $newController->$action($matches);//Chama a ação com os parâmetros capturados.
            }
        }

        if(!$routerFound){ // Verifica se nenhum roteador foi encontrado.
            require_once __DIR__."/../app/controllers/AlertasController.php";// Chama o arquivo do controlador correspondente.
            $controller = new AlertasController();//Instancia o controlador.
            $controller->not_found(); //Direciona para o controlador "NotFoundController".
        }

    }

}