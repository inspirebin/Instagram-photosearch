<?php 
 if(!empty($_GET['location'])){
   $location = $_GET['location'];
   $google_map = "http://maps.googleapis.com/maps/api/geocode/json?address=".$location;
   $data = file_get_contents($google_map);
    /*decode json*/
   $json = json_decode($data,true);
     
    $lt=  $json['results'][0]['geometry']['location']['lat'];
    $lg = $json['results'][0]['geometry']['location']['lng'];
     
    $client = /* :) dont mess up with my client id, generate yours */
     
    $insta = "https://api.instagram.com/v1/media/search?access_token=".$client."&lat=".$lt."&lng=".$lg."";
     $i = file_get_contents($insta);
     $img = json_decode($i,true);
     
     //echo var_dump($img);
     
     foreach($img['data'] as $image){
         echo '<img src="'.$image['images']['standard_resolution']['url'].'"/>';
     }
     //echo $insta;
 }
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body bgcolor="#4f4f4f">
<form action="">
    <input type="text" name="location">
    <button type="submit">find</button>
</form>
</body>
</html>
