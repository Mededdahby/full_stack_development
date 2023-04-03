<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="public/css/u_style.css">
</head>
<body>
<?php
        session_start();
        if(!isset($_SESSION['user'])){
            echo "<script>location.href = \"login.php\"</script>";
        }
        $fp=fopen("users.json","a+");
        $content = fread($fp,filesize("users.json"));
        $decoded=json_decode($content);
    ?>
        <nav>
        <span>Username :<?php echo $_SESSION['user']?></span>
        <a href="login.php?logout=1">Logout</a>
        </nav>
        <div class="container">
            <?php
                foreach ($decoded as $obj) {
                    if($obj->id == $_GET["id"]){
                    echo "
                        <img src=\"public/images/{$obj->id}.png\">
                        <div>ID : {$obj->id}</div>
                        <div>NAME : {$obj->username}</div>
                        <div>SCORE : {$obj->score}</div>
                    ";
                }
                }
                
            ?>
            <a href="usersList.php">back</a>
        </div>
</body>
</html>