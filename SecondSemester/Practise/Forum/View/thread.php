
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
            <form   method="post" id="form-reaction" class="reaction">
            
            <?php foreach ($reactions as $reaction) : ?>
                <?php $userToCommentReactingManager= new UserToCommentReactingManager;
                $a=$userToCommentReactingManager->getByUserComment($_SESSION["id"],$comment->getId());?>
                <?=count($userToCommentReactingManager->getAllByCommentAndReaction($comment->getId(),$reaction->getId()));?>
                <?php if (is_null($a)) :?>
                    <button name= "reactionSub[<?= $reaction->getId()?>]" type="submit" value= "<?= $comment->getId()?>"> <?= $reaction->getEmoji()?> </button>
                <?php elseif($reaction->getId()===$a->getReacion_id()):?>
                    <button name= "reactionSub[<?= $reaction->getId()?>]" type="submit" value= "<?= $comment->getId()?>" style="background-color:red"><?= $reaction->getEmoji()?> </button>
                <?php else:?>
                    <button name= "reactionSub[<?= $reaction->getId()?>]" type="submit" value= "<?= $comment->getId()?>"> <?= $reaction->getEmoji()?> </button>

                <?php endif; ?>
            <?php endforeach ?>
            </form>
            <br>
            autor:<a href= "user/<?= $comment->getUser_id()?>"> <?= $comment->getAuthorUsername()?></a>
        </td>
        
    </tr>
<?php endforeach ?>

<form   method="post" id="form-comment" class="forms">

<br>
        Váš komentář:
        <input name="comment-content" type="text" >
      
       
        <input class="button" name= "commentSub" value= "Komentovat" type="submit">
        
        </input>

    <br>
 

</form>

