<?php
$routes = [
    '/' => 'HomeController@index',
    '/home' => 'HomeController@index',
    '/usuarios' => 'UserController@index',
    '/usuario-deletar' => 'UserController@delete_user',
    '/planos' => 'PlanosController@index',
    '/autenticacao' => '_2faController@index',
    '/login' => 'LoginController@index',
    '/cadastro' => 'CadastroController@index',
    
    
    
];