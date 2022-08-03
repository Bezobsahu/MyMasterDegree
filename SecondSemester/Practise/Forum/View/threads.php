<h1>Seznam všech vláken</h1>
<table style="Threads">
<?php foreach ($threads as $thread) : ?>
    <tr>
        <td>
            <br>
            <h2><a href="threads/<?= $thread['id']?>"><?= $thread['name'] ?></a></h2>
            autor:<a href="user/id_ <?= $thread['user_id']?> "> <?= $thread['username']?></a>
            <br>
            <br>
           
            <?= $thread['content'] ?>
            
        </td>
        
    </tr>
<?php endforeach ?>
</table>