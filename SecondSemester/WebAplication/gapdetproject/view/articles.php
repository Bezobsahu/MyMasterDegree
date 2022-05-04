<h1>Seznam článků</h1>
<br>
<table style="article">
<?php foreach ($articles as $article) : ?>
    <tr>
        <td>
            <br>
            <h2><a href="articles/<?= $article['url'] ?>"><?= $article['title'] ?></a></h2>
            <?= $article['description'] ?>
            
        </td>
        
    </tr>
<?php endforeach ?>
</table>