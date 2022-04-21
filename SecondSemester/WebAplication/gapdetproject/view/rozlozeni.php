<!DOCTYPE html>
<html lang="cs-cz">
    <head>
        <base href="/localhost" />
        <meta charset="UTF-8" />
        <title><?= $title ?></title>
        <meta name="description" content="<?= $description ?>" />
        <meta name="keywords" content="<?= $keyWords?>" />
        <link rel="stylesheet" href="view/style.css" type="text/css"/>
    </head>

    <body>
        <header>
            <h1>ITnetworkMVC - ukázkový web</h1>
        </header>

        <nav>
            <ul>
                <li><a href="clanek/uvod">Úvod</a></li>
                <li><a href="clanek">Články</a></li>
                <li><a href="kontakt">Kontakt</a></li>
            </ul>
        </nav>
        <br clear="both" />

        <article>
        <?php $this->controler->showView(); ?>
        </article>

        <footer>
            <p>Ukázkový tutoriál pro jednoduché MVC z programátorské sociální sítě
            <a href="http://www.itnetwork.cz" target="_blank">itnetwork.cz</a>.</p>
        </footer>
    </body>
</html>