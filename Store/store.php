<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleStore.css">
    <title>Stor</title>
</head>
<body>
    <header>
        <h1>MY Store</h1>
    </header>
    <div class="container">
    <?php 
        include "data.php";
        $aff = array();?>
      <?php  foreach($products as $pro){ ?>
            <div class="item">
            <form  class="add" action="" method="get">
        <button name="addp"><img src="imgs/plus.png"> </button>
            </form>   
        <img src="<?php echo $pro['img']?>" alt="">
            <h2><?php echo $pro['name'].'<br>'.$pro['price']?></h2>
          <?php  array_push($aff ,$pro['id'] );
          ?>
            </div>
    <?php } ?>
    </div>
        <Aside>
        <h1 class="total:">Total :</h1>
        <?php
if(isset($_GET['addp']))
{
    foreach($products as $p){
         if($p['id'] == $aff){?>
            <div  class="panel" >
            <img src="<?php echo $pro['img']?>"alt="">
            <h2>
        <h2 class="qtt">
        </h2><?php echo $pro['name'].'<br>'.$pro['qtt']?> </h2>
            <div class="del">
            <img  src="imgs/del.png" alt="">
            </div>
        </div>  
<?php }}}?>
 </Aside>
</body>
</html>