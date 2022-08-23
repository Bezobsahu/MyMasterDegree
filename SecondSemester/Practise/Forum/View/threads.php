<h1>Seznam všech vláken</h1>
<table style="Threads">
<?php foreach ($threads as $thread) : ?>
    <tr>
        <td>
            <br>
            <h2><a href="threads/<?= $thread->getId()?>"><?= $thread->getName() ?></a></h2>
            autor:<a href="user/<?= $thread->getUser_id()?> "> <?= $thread->getAuthorUsername()?></a>
            <br>
            <br>
           
            <?= $thread->getContent() ?>
            
        </td>
        
    </tr>
<?php endforeach ?>
</table>