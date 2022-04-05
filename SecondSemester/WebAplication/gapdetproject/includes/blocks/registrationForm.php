<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
<form action="includes/comands/register.php" method="post" class="forms">


        Uživatelské jméno
        <input name="userName" type="text">
        Jméno
        <input name="name" type="text">
        Příjmení
        <input name="surname" type="text">
        Email
        <input name="email" type="text">
        Heslo
        <input name="password" type="text">
        <br>
        <input class="button" value= "Registrovat se" type="submit">
        
        </input>

    <br>
    
    <div><a href="index.php">Přihlášení</a></div>

</form>
</body>
</html>