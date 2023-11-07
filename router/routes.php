<?php
$routes = [
    '/' => 'HomeController@index',
    '/home' => 'HomeController@index',
    '/usuarios' => 'UserController@index',
    '/usuarios/sgdohiqergh849dfjhf-delete/{id}' => 'UserController@delete_user',
    '/planos' => 'PlanosController@index',
    '/autenticacao' => '_2faController@index',
    '/login' => 'LoginController@index',
    '/login-fgdfgr546-auth' => 'LoginController@login_user',
    '/login-logout' => 'LoginController@logout_user',
    '/cadastro' => 'CadastroController@index',
    '/modelo-do-banco' => 'Modelo_bdController@index',
    '/sobre-nos' => 'SobreNosController@index',
    '/perfil' => 'PerfilController@index'

];