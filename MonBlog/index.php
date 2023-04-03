<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="public/css/index_style.css">
    <title>Notre Blog</title>
</head>
<body>
<?php
        session_start();
        if(isset($_GET["logout"])){
             echo "<script>location.href = \"index.php\"</script>";
             session_destroy();  
        }
        $fp=fopen("articles.json","a+");
        $content = fread($fp,filesize("articles.json"));
        $decoded=json_decode($content);

        function UserData($var){
            return ($_SESSION["user"] == $var->username) ;
        }
        function ScorFelter($a , $b){
          return  $a->score<$b->score;
        }

        usort($decoded, 'ScorFelter');
  
        if(isset($_SESSION['user']) && $_SESSION['user']!="admin"){
            $decoded = array_filter($decoded,"UserData");
        }
    ?>
        <nav>
            <h1>Mon Blog</h1>
          <?php
            if(isset($_SESSION['user'])){  
            echo "<div class=\"name\">".$_SESSION['user']." :</div>";?> 
            <a href="index.php?logout=1"><i class="fa-solid fa-circle-xmark">Logout</i></a>
            <?php  }  
        else{?>
            <a href="login.php"><i class="fa-solid fa-right-to-bracket">login</i></a>
            <?php } 
            if(isset($_SESSION['user']) && $_SESSION['user']=="admin"){?>
                <a href="usersList.php"><i class="fa-solid fa-bars">Users</i></a>
                <?php   }?>
        </nav>
        <?php if(isset($_SESSION['user'])) {?>
              <div class="add">
             <a href="editArticle.php"><i class="fa-sharp fa-solid fa-plus"></i></a>
    </div>
    <?php   }
echo "<div class=\"container\">";
                foreach ($decoded as $obj) {
                    if(isset($_SESSION['user']) ){
                        echo "
                        
                        <div class=\"items\">
                         <div>Titre : {$obj->titre}</div>
                         <div>Auteur : {$obj->username}</div>
                         <div>DateCreation : {$obj->dateCreation}</div>
                         <div>DateEditing : {$obj->editTime}</div>
                         <div>Resume : {$obj->resume}</div>
                         <div class=\"contenu\">Contenu : {$obj->contenu}</div>      
                         <div class=\"actions\">
                         <div> <i class=\"fa-solid fa-star\"></i>{$obj->score}</div>
                         <a href=\"editArticle.php?id={$obj->id}\"><i class=\"fa-solid fa-pen-to-square\"></i></a>
                         <a href=\"index.php?delete={$obj->titre}\"><i class=\"fa-solid fa-trash\"></i></a>
                         </div>
                         </div>
                     ";
                    }
                    elseif(isset($_SESSION['user']) && $_SESSION['user']=="admin" ) {
                        echo "
                        <div class=\"items\">
                        <div>Titre : {$obj->titre}</div>
                        <div>Auteur : {$obj->username}</div>
                        <div>DateCreation : {$obj->dateCreation}</div>
                        <div>DateEditing : {$obj->editTime}</div>
                        <div>Resume : {$obj->resume}</div>
                        <div class=\"contenu\">Contenu : {$obj->contenu}</div>      
                        <div class=\"actions\">
                        <div> {$obj->score}<i class=\"fa-solid fa-star\"></i></div>
                        <a href=\"editArticle.php?id={$obj->id}\"><i class=\"fa-solid fa-pen-to-square\"></i></a>
                        <a href=\"index.php?delete={$obj->titre}\"><i class=\"fa-solid fa-trash\">ffd</i></a>
                        <div class=\"star\"> 
                        <a href=\"index.php?score={$obj->id}\"><i class=\"fa-solid fa-star\"></i></a>
                            </div>
                        </div>
                        </div>
                        </div>
                    ";
                    }
                  else {
                 
                    echo "
                       <div class=\"items\">
                        <div>Titre : {$obj->titre}</div>
                        <div>Auteur : {$obj->username}</div>
                        <div>DateCreation : {$obj->dateCreation}</div>
                        <div>Resume : {$obj->resume}</div>
                        <div class=\"contenu\">Contenu: {$obj->contenu}</div>
                        <div class=\"score\"> 
                        <a href=\"index.php?score={$obj->id}\"><i class=\"fa-solid fa-star\"></i></a>
                        <div> {$obj->score}</div>
                        </div>
                        </div>
                    ";
                }}
echo "</div>";


                function ArticleDelete($user){
                    $fp=fopen("users.json","a+");
                    $content = fread($fp,filesize("users.json"));
                    $decoded=json_decode($content);
                    // function test ()
                    // { return ($user != $var->username);
                    // } 
                    // $decoded = array_filter($decoded,"test");
                    unset($decoded->$user);
                    $encoded = json_encode($decoded);
                    $fp=fopen("users.json","w+");
                    fwrite($fp,$encoded);
                    fclose($fp);
                }
                if(isset($_GET['delete'])){
                    $i = 0;
                foreach($decoded as $art){
                if($art->titre==$_GET['delete']){
                array_splice($decoded,$i,1);
                }
                $i++;
                }
                $encoded = json_encode($decoded);
                $fp=fopen("articles.json","w+");
                fwrite($fp,$encoded);
                fclose($fp);
                echo "<script>location.href = \"index.php\"</script>";
            }
        function userScore($userna){
            $us=fopen("users.json","a+");
            $user_content = fread($us,filesize("users.json"));
            $user_decoded=json_decode( $user_content);
        foreach($user_decoded as $users){
            if($users->username == $userna ){
                $users->score++;
            }
        }
            $user_encoded = json_encode($user_decoded);
            $us=fopen("users.json","w+");
            fwrite($us,$user_encoded);
            fclose($us);        
        }
            
            if(isset($_GET['score'])){
                foreach($decoded as $art){
                    if($art->id==$_GET['score']){
                    $art->score++; 
                    userScore( $art->username);
                    } }
                    $encoded = json_encode($decoded);
                    $fp=fopen("articles.json","w+");
                    fwrite($fp,$encoded);
                    fclose($fp);
            }
           
            ?>
</body>
</html>