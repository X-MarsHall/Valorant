<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>IG Get Infomation</title>
  </head>
  <body>

<div class="container-fluid">
<br><br><br>
    <h1>Instagram GET Infomartion</h1>
 <br>
<center>
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Username IG</label><br>
    <input type="text" name="url" placeholder="username">
    <br><br>
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>
</center>


<?php

error_reporting(0);
if(isset($_GET['url'])){

  $u = $_GET['url'];


function http_request($url){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; Android 5.0.2; Redmi Note 3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.96 Mobile Safari/537.36');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}
$ko = http_request("https://www.instagram.com/$u/?__a=1");
$ko = json_decode($ko, TRUE);


$user = $ko['graphql']['user']['username'];
$bio  = $ko['graphql']['user']['biography'];
$name = $ko['graphql']['user']['full_name'];
$peng = $ko['graphql']['user']['edge_followed_by']['count'];
$meng = $ko['graphql']['user']['edge_follow']['count'];
$foto = $ko['graphql']['user']['profile_pic_url_hd'];


echo '<a> Username : ' .$user. '</a><br>';
echo '<a> Nama Lengkap : ' .$name. '</a><br>';
echo '<a> Bio : ' .$bio. '</a><br>';
echo '<a> Pengikut : ' .$peng. '</a><br>';
echo '<a> Mengikuti : ' .$meng. '</a><br><br><br>';
echo '<a> Foto Profil : </a><br><br>';
echo '<img src='.$foto.'/><br><br><br>';



echo '<a>GET Media : <a><br><br>';
sleep(1);
for ($i=0; $i <= 10; $i++) {
$medi = $ko['graphql']['user']['edge_owner_to_timeline_media']['edges'][$i]['node']['display_url'];
if ( $medi ){
    echo '<img src='.$medi.'/><br><br><br>';
} else {
    echo "[×] Akun Privat \n";
    exit();
}

}

}


?>

</div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>