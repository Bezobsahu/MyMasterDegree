
    <h1><?= $name ?></h1>

    <?= $section->getName() ?>
    <br>
    <br>
autor: <a href='user/<?= $author_id?>'><?= $author ?></a>
    
<br>
<br>

<?= $content ?>

<?php foreach ($comments as $comment) : ?>
    <tr>
        <td>
            <br>
            
            <br>
            
            <?= $comment->getContent()?>
            
            <br>
            autor:<a href= "user/<?= $comment->getUser_id()?>"> <?= $comment->getAuthorUsername()?></a>
        </td>
        
    </tr>
<?php endforeach ?>



