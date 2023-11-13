<?php
$routes = [
    '/' => 'HomeController@index',
    '/home' => 'HomeController@index',
    '/usuarios' => 'UserController@index',
    '/usuarios/sgdohiqergh849dfjhf-delete/{id}' => 'UserController@delete_user',
    '/planos' => 'PlanosController@index',
    '/contratar-plano485asd459' => 'PlanosController@cadastrar_plano',
    '/autenticacao/asdklksdaas648/{id}' => '_2faController@index',
    '/autenticacao/asdklksdaas648/5d4as6s-session/{id}' => '_2faController@autenticacao_2fa',
    '/login' => 'LoginController@index',
    '/login-fgdfgr546-auth' => 'LoginController@login_user',
    '/login-logout' => 'LoginController@logout_user',
    '/cadastro' => 'CadastroController@index',
    '/cadastro-65465adsdwee-user-4856er456' => 'CadastroController@cadastro',
    '/modelo-do-banco' => 'Modelo_bdController@index',
    '/sobre-nos' => 'SobreNosController@index',
    '/perfil' => 'PerfilController@index',
    '/perfil-editar-senha48reg84erg' => 'PerfilController@editar_senha',
    '/perfil-deletar-planowe456erg546erg' => 'PerfilController@delete_contrato'
];