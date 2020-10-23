<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Admin Finder</title>
  </head>
  <body>

<div class="container-fluid">
<br><br><br>
    <h1>Admin Finder</h1>
 <br>
<center>
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Url Target :</label><br>
    <input type="text" name="url" placeholder="http://target.co">
    <br><br>
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>
</center>


<?php

error_reporting(0);

$payload = array (
"/admin/",
"/administrator/",
"/admin1/",
"/admin2/",
"/admin3/",
"/admin4/",
"/admin5/",
"/login.php",
"/usuarios/",
"/adm_cp/"
);

if(isset($_GET['url'])){

    $url = $_GET['url'];

 foreach($payload as $h){

    $shall = curl_init();
    curl_setopt($shall, CURLOPT_URL, $url.$h);
    curl_setopt($shall, CURLOPT_HEADER, 1);
    curl_setopt($shall, CURLOPT_RETURNTRANSFER, 1); 
    $result = curl_exec($shall);
    
     if (preg_match('/HTTP\/1.1 200/i', $result)){   
        
        echo '<font color="#008000"> [+] ' . htmlspecialchars($url).$h . '==> Found </font><br>';
    
             
     } else {
    
         echo '<font color="#FF0000"> [x] ' . htmlspecialchars($url).$h . '==> Not Found</font><br>';
         
    }
 }   
} 


?>



</div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>