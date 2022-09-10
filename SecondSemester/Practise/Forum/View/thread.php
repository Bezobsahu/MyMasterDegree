
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

<form   method="post" id="form-comment" class="forms">


        Váš komentář:
        <input name="comment-content" type="text" >
      
       
        <input class="button" value= "Komentovat" type="submit">
        
        </input>

    <br>
 

</form>

