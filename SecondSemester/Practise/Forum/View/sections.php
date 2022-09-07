<?php foreach ($sections as $section) : ?>
    <tr>
        <td>
            <br>
            
            <br>
            <a href="sections/<?= $section->getId()?>"> <?= $section->getName()?> </a>
            <br>
            <?= $section->getDescription()?>
            
            <br>
            autor:<a href= "user/<?= $section->getUser_id()?>"> <?= $section->getAuthorUsername()?></a>
        </td>
        
    </tr>
<?php endforeach ?>
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