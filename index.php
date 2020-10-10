<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . "/discord.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Lontong - Free Watch Anime Simulcast</title>
<link rel="icon" href="https://files.catbox.moe/xcncgj.png">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">
Lontong <img src="https://files.catbox.moe/xcncgj.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/anime-list">Anime List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Simulcast Callendar</a>
      </li>
    </ul>
    <?php
     if(isset($_SESSION['user'])){
     ?>
    <ul class="nav navbar-nav navbar-right">
    <li class="nav-item">
        <a class="nav-link" href="/logout.php">Logout</a>
      </li>
    <ul>
    <?php }else{ ?>
    <ul class="nav navbar-nav navbar-right">
    <li class="nav-item">
        <a class="nav-link" href="https://discordapp.com/oauth2/authorize?response_type=code&client_id=762237345663549470&redirect_uri=https://lontong.herokuapp.com/login.php&scope=identify%20guilds&state=4394fe3f72d24e37bfd86ab6">Login</a>
      </li>
    <ul>
    <?php } ?>
  </div>
</nav>
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Warning!</h4>
  <p class="mb-0">If you have a bugs please contact <a href="mailto:yukifag@pm.me" class="alert-link">yukifag@pm.me</a>.</p>
</div>
<div class="container-fluid content-row">
<h1>Last Releases</h1>
<hr>
    <div class="row">
<?php
$url                    = "https://api.npoint.io/d0e5b9a54c45eb5a698e";
$json                   = file_get_contents($url);
$array                  = json_decode($json, true);
foreach($array["releases"] as $item) {
        echo '<div class="col-sm-12 col-lg-6">';
        echo '<div class="card mb-4 border-secondary">';
        echo '<img style="height: 100%; width: 100%; display: block;" src="'.$item["thumb"].'" alt="Card image">';
        echo '<h3 class="card-header"><a href="/episode/'.$item["id"].'">Watch '.$item["anime_ep_title"].' Episode '.$item["episode"].'</a></h3>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$item["ep_title"].'</h5>';
        echo '<h7 class="text-muted">'.$item["ep_desc"].'</h7></div></div>';
        echo '<div class="w-100"></div>';
        echo '</div>';
}?>
</div>
</body>
</html>
