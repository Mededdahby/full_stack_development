<?php
  $products=[
   array( 
        "id"=>1,
        "name"=>"hp elitebook",
        "price"=> 8120,
        "qtt"=>0,
        "img"=> "1.png"
  ),
        array( 
        "id"=>2,
        "name"=> "Thinkpad X1",
        "price"=> 10110,
        "qtt"=>0,
        "img"=> "2.png"
    ),
     array(  
        "id"=>3,
        "name"=> "Macbook pro",
        "price"=> 17219,
        "qtt"=>0,
        "img"=> "3.png"
),
      
     array (
        "id"=>4,
        "name"=> "Thinkpad x280",
        "price"=> 8120,
        "qtt"=>0,
        "img"=> "4.png"
),
      array(  
        "id"=>5,
        "name"=> "hp elitebook",
        "price"=> 8120,
        "qtt"=>0,
        "img"=> "5.png"
),
       array( 
        "id"=>6,
        "name"=> "Thinkpad x280",
        "price"=> 8120,
        "qtt"=>0,
        "img"=> "6.png"
),
        array(
        "id"=>7,
        "name"=> "hp elitebook",
        "price"=> 8120,
        "qtt"=>0,
        "img"=> "7.png"
),
        array(
        "id"=>8,
        "name"=> "hp elitebook",
        "price"=> 8120,
        "qtt"=>0,
        "img"=> "8.png"
),
       array (
        "id"=>9,
        "name"=> "Thinkpad x1 youga",
        "price"=> 12200,
        "qtt"=>0,
        "img"=> "9.png"
),
  array(  
         "id"=>10,
        "name"=> "Azus Y142",
        "price"=> 8120,
        "qtt"=>0,
        "img"=> "10.png"
  )
  ];
 $jsoncode = json_encode($products);
echo $jsoncode;
          ?>