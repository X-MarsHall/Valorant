<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Hash Generator</title>
  </head>
  <body>

<div class="container-fluid">
<br><br><br>
    <h1>Hash Generator</h1>
 <br>
<center>
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Masukkan Text :</label><br>
    <input type="text" name="url" placeholder="text ...">
    <br><br>
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>
</center>
</div>

<?php


  if(isset($_GET['url'])){

    $var = $_GET['url'];

   $encrypt = sha1($var);
   echo "[+] sha1   ==> " . $encrypt . "<br>";
   
   $enc = md5($var);
   echo "[+] md5    ==> " . $enc. "<br>";
   
   $en  = base64_encode($var);
   echo "[+] base6  ==> " . $en . "<br>";
   
   $bcr = password_hash($var, PASSWORD_DEFAULT);
   echo "[+] bcrypt ==> " . $bcr . "<br>";
   
   $sh5 = hash('sha512', $var);
   echo "[+] sha512 ==> " . $sh5 . "<br>";
   
   $sh2 = hash('sha256', $var);
   echo "[+] sha256 ==> " . $sh2 . "<br>";
   
   $sh3 = hash('sha384', $var);
   echo "[+] sha384 ==> " . $sh3 . "<br>";
   
   $sh4 = hash('sha224', $var);
   echo "[+] sha224 ==> " . $sh4 . "<br>";

}

?>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>