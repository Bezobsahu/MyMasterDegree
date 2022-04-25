<!DOCTYPE html>
<html lang="cs-cz">
    <head>
        <base href="/localhost" />
        <meta charset="UTF-8" />
        <title><?= $title ?></title>
        <meta name="description" content="<?= $description ?>" />
        <meta name="keywords" content="<?= $keyWords?>" />
        <link rel="stylesheet" href="view/main.css" type="text/css"/>
    </head>

    <body>
        <header>
            <?php require('blocks/header.php') ?>
        </header>

        <article>
            <?php $this->controler->showView(); ?>
        </article>

        <footer>
            <?php require ('blocks/footer.php') ?>
        </footer>  
    </body>
</html>