
<ul>
  <li><a href="sections">Sections</a></li>
  <?php if($login===true) :?>
    <?php $userManager = new UserManager?>
    Přihlášen:
       <a href='user/<?=$_SESSION["id"] ?>'><?= $userManager->getUserWithId($_SESSION["id"])->getUsername() ?>
       <br>
       <li><a href="Logout">Logout</a></li>
<?php else : ?>
    <li><a href="LoginForm">Login</a></li>
<?php endif; ?>
  
</ul>


