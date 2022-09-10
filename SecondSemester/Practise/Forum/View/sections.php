<h1><?= $section?></h1>

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

<br>
<br>
<form  method="post" id="form-section" class="forms">
Název nové sekce:
        <input name="SectionName" type="text" required>

Obsah sekce:
        <input name="SectionDescription" type="text" >
      
       
        <input class="button" name="SectionSub" value= "Přidat novou sekci" type="submit">
        
        </input>

</form>


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

<form   method="post" id="form-thread" class="forms">
<br>

        Název nového vlákna:
        <input name="threadName" type="text" required>
        Obsah nového vlákna:

        <input name="threadContent" type="text" required>
      
       
        <input class="button" name= "threadSub" value= "Přidat vlákno" type="submit">
        
        </input>

    <br>
 

</form>
