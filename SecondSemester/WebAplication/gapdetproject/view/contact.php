<h1>Kontaktní formulář</h1>

<p>Kontaktujte mě odesláním formuláře níže.</p>

<form method="post" id="form-email" class="forms">
    Vaše emailová adresa<br />
    <input type="email" name="email" required="required" value="<?php if (isset($_POST['email'])) echo(htmlspecialchars($_POST['email'])); ?>" /><br />
    Antispam <br />
    <input type="text" name="year" required="required" placeholder="zadejte aktuální rok" /><br />
    <textarea name="message"><?php if (isset($_POST['zprava'])) echo(htmlspecialchars($_POST['zprava'])); ?></textarea><br />
    <input type="submit" value="Odeslat" class="button" />
</form>