<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo  generateUrl('/public/css/style.css'); ?>">
    <link rel="icon" type="image/svg" href="<?php echo  generateUrl('/public/images/logos/logo.svg'); ?>" />

</head>

<body id="body_index">
    <!---------------------------header -------------------------------------------->
    <?php
    require_once __DIR__ . "/views/components/header.php";
    ?>

    <!------------------------------ renderização das páginas --------------------------------->
    <?php
    function generateUrl($path)
    {
        $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
        $base_url .= dirname($_SERVER['SCRIPT_NAME']);
        return rtrim($base_url, '/') . '/' . ltrim($path, '/');
    }

    require_once __DIR__ . '/utils/Core.php';
    require_once __DIR__ . '/router/routes.php';

    spl_autoload_register(function ($file) {
        if (file_exists(__DIR__ . "/utils/$file.php")) {
            require_once __DIR__ . "/utils/$file.php";
        } else if (file_exists(__DIR__ . "/app/models/$file.php")) {
            require_once __DIR__ . "/app/models/$file.php";
        }
    });
    $core = new Core();
    $core->run($routes);



    ?>

    <!--------------------Footer---------------------------------->
    <?php
    require_once __DIR__ . "/views/components/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>