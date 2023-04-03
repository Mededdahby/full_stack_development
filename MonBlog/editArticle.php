<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/articles_style.css">
    <title>Edit</title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION["user"])) {
    echo "<script>location.href = \"index.php\"</script>";
}
if(isset($_GET['submit'])){
    if(file_get_contents('articles.json') == ''){
        $articlearray = array();
        $articlearray = array("id" => 0,"titre"=>$_GET["titre"],"score"=>0 ,"username"=>$_SESSION["user"],"resume"=>$_GET["resume"],"categorie"=>$_GET["categorie"],"contenu"=>$_GET["contenu"],"dateCreation"=>date("Y/m/d - h:i:sa"),"editTime" => 0, );
        $articlesarray[] = $articlearray;
        $encoded = json_encode($articlesarray);
        $fp=fopen("articles.json","a+");
        fwrite($fp,$encoded);
        fclose($fp);
        echo "<script>location.href = \"index.php\"</script>";

    }else{
        $fp=fopen("articles.json","a+");
        $content = fread($fp,filesize("articles.json"));
        $decoded=json_decode($content);
        $articlearray = array("id" => sizeof($decoded) , "titre"=>$_GET["titre"],"score"=>0 ,"username"=>$_SESSION["user"],"resume"=>$_GET["resume"],"categorie"=>$_GET["categorie"],"contenu"=>$_GET["contenu"],"dateCreation"=>date("Y/m/d - h:i:sa"),"editTime" => 0 );
        $decoded[] = $articlearray;
        $encoded = json_encode($decoded);
        $fp=fopen("articles.json","w+");
        fwrite($fp,$encoded);
        fclose($fp);
        echo "<script>location.href = \"index.php\"</script>";

    }
}
if(isset($_GET['submit-edit'])){
    $fp=fopen("articles.json","a+");
    $content = fread($fp,filesize("articles.json"));
    $decoded=json_decode($content);
    $decoded[$_GET['id']]->titre = $_GET["titre"];
    $decoded[$_GET['id']]->resume = $_GET["resume"];
    $decoded[$_GET['id']]->categorie = $_GET["categorie"];
    $decoded[$_GET['id']]->contenu = $_GET["contenu"];
    $decoded[$_GET['id']]->editTime =date("Y/m/d - h:i:sa") ;
    $encoded = json_encode($decoded);
    $fp=fopen("articles.json","w+");
    fwrite($fp,$encoded);
    fclose($fp);
    echo "<script>location.href = \"index.php\"</script>";
}    
if(isset($_GET['id'])){
    $fp=fopen("articles.json","a+");
    $content = fread($fp,filesize("articles.json"));
    $decoded=json_decode($content);
    fclose($fp);
    function filtering($var){
        return ($_GET['id'] == $var->id) ;
    }
    $article = array_filter($decoded,"filtering");
?>

  <form action="editArticle.php" method="get">
<fieldset>
<input type="hidden" name="id" value ="<?php echo $_GET['id'] ?>">
<legend>Titre:</legend>
<input type="text" name="titre" maxlength="30" value="<?php echo $article[$_GET['id']]->titre?>" required>
<legend>Resume:</legend>
<input type="text" name="resume" maxlength="200" value="<?php echo $article[$_GET['id']]->resume?>" required>
<legend>Categorie:</legend>
<select name="categorie" required>
  <option value="1">Info</option>
  <option value="2">Art</option>
  <option value="3">Sport</option>
  <option value="3">Science</option>
</select>
<legend>Contenu:</legend>
<textarea name="contenu" id="" cols="150" rows="10" value="" required><?php echo $article[$_GET['id']]->contenu?></textarea>
</fieldset>
<button type="submit" name="submit-edit">Save</button>
<?php
}else{
?>
  <form action="editArticle.php" method="get">
<fieldset>
<legend>Titre:</legend>
<input type="text" name="titre" maxlength="30" required>
<legend>Resume:</legend>
<input type="text" name="resume" maxlength="200"  required>
<legend>Categorie:</legend>
<select name="categorie" required>
  <option value="1">Info</option>
  <option value="2">Art</option>
  <option value="3">Sport</option>
  <option value="3">Science</option>
</select>
<legend>Contenu:</legend>
<textarea name="contenu" id="" cols="30" rows="10" required></textarea>
</fieldset>
<button type="submit" name="submit">Save</button>
<?php
}
?>

  </form>  
</body>
</html>


