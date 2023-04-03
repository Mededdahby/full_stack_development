<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleLogin.css">
    <title>Login</title>
</head>
<body> 
<form class="don"action="" method="post">
    <h1>Login</h1>
<label for="">UserName</label>
<input type="text" name="username">
<label for="">Password</label>
<input type="password" name="password">
<input type="submit" name="submit">
</form>
</body>
</html>

<?php
include_once "users.php";
$msg='';
session_start();
 if(isset($_POST['submit'])){
$username =isset($_POST['username'])? strtolower($_POST['username']): '';
$password = isset($_POST['password'])? $_POST['password'] : '';

foreach($users as $client){
    if($client["username"]==$username && $client['password']==$password){
        header("location:str.php");
        break;
    }
    else{
       $msg ="nop"; 
    }
}
echo $msg;

 }

?>