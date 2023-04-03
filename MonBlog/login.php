<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/r_style.css">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if(isset($_GET["logout"])){
        header("Refresh:0");
    echo "<script>location.href = \"login.php\"</script>";
   
        session_destroy();
    }
    if(isset($_POST['submit'])){
    if($_POST["cpassword"]==$_POST["password"]){
        if(file_get_contents('users.json') == ''){
        $usersarray = array();
        $userarray = array("id"=>0,"username"=>$_POST["username"],"score"=>0,"password"=>$_POST["password"]);
        $usersarray[] = $userarray;
        $encoded = json_encode($usersarray);
        $fp=fopen("users.json","a+");
        fwrite($fp,$encoded);
        fclose($fp);
    }else{
        $fp=fopen("users.json","a+");
        $content = fread($fp,filesize("users.json"));
        $decoded=json_decode($content);
        $userarray = array("id"=>$decoded[0]->id++,"username"=>$_POST["username"],"score"=>0,"password"=>$_POST["password"]);
        $decoded[] = $userarray;
        $encoded = json_encode($decoded);
        $fp=fopen("users.json","w+");
        fwrite($fp,$encoded);
        fclose($fp);
    }
    }else{
    echo "<script>location.href = \"register.php?error=1\"</script>";
    }    
    }
    
    ?>
    
    <form action="login.php" method="post">
        <fieldset>
            <legend>login</legend>
    <label for="username">Username</label>
        <input type="text" name="user">
        <label for="password">password</label>
        <input type="text" name="pass">
        <input type="submit" name="login">
        </fieldset>
        <a href="register.php">Register</a>
    </form>
  
    <?php 
if(isset($_POST['login']))
{
   $fp=fopen("users.json","a+");
    $content = fread($fp,filesize("users.json"));
    $decoded=json_decode($content);
foreach(  $decoded   as $user){
    if($user->username == $_POST['user'] && $user->password == $_POST['pass']){
        $_SESSION['id'] = $user->id;
        $_SESSION['user'] = $user->username;
        echo "<script>location.href = \"index.php\"</script>";
    }
} 
echo "erreur de connection";
}
    ?>
</body>
</html>