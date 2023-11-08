<title> <?php echo $title ?></title>
<main id="main2fa">

    <img id="banner_2fa" src="<?php echo  generateUrl('/public/images/banners/banner login 1.svg')?>" alt="">

    <form method="post" action="5d4as6s-session/<?=$id?>" id="form_2fa">
        <h4>
            <?php echo $perguntas; //printa as perguntas do 2fa?>
        </h4><br>

        <input name="pergunta_2fa" value="<?= $perguntas?>" type="hidden">

        <input name="resposta_2fa" id="input_2fa" type="text" placeholder="Resposta"><br>

        <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
            </svg>
        </button>
    </form>
</main>