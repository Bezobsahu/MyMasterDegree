
    <h1><?= $name ?></h1>


<?= $author ?>
    
<br>
<br>

<?= $content ?>

<?php foreach ($comments as $comment) : ?>
    <tr>
        <td>
            <br>
            
            <br>
            
            <?= $comment['content'] ?>
            
            <br>
            autor:<a href= "user/id_<?= $comment['user_id']?>"> <?= $comment['username']?></a>
        </td>
        
    </tr>
<?php endforeach ?>


