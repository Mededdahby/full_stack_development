<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/r_style.css">

    <title>Users</title>
</head>
<body>
    <?php
    if(isset($_GET["error"])){
        echo "<div> Mot de passe confirme pas valide </div>";
    }
    ?>
    <form action="login.php" method="post">
    <fieldset>
               <legend>register</legend>
        <label for="username">Username</label>
        <input type="text" name="username">
        <br>
        <label for="password">password</label>
        <input type="text" name="password">
        <br>
        <label for="cpassword">confirmed password</label>
        <input type="text" name="cpassword">
        <br>
        <input type="submit" name="submit">
    </fieldset>
    </form>
</body>
</html>