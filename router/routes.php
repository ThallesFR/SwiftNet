<?php
$routes = [
    '/' => 'HomeController@index',
    '/usuarios' => 'UserController@show',
    '/planos' => 'PlanosController@index',
    '/autenticacao' => '_2faController@index',
    '/login' => 'LoginController@index',
    
];