<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . "/discord.php";
$id                     = $_GET['id'];
$url                    = "https://api.npoint.io/fc85e39b80fd75d36705/$id";
$json                   = file_get_contents($url);
$array                  = json_decode($json, true);
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<html lang="en">
<head>
<title>Lontong - Free Watch Anime Simulcast</title>
<link rel="icon" href="https://files.catbox.moe/xcncgj.png">
<meta property="og:site_name" content="Lontong"/>
<meta property="og:type" content="tv_show"/>
<meta property="og:url" content="<?php echo $actual_link?>"/>
<meta property="og:image" content="<?php echo $array['cover']?>"/>
<meta name="title" property="og:title" content="<?php echo $array['name'] ?> - Watch on Lontong">
<meta name="description" property="og:description" content="<?php echo $array['desc'] ?> - Watch on Lontong">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/object-fit-images/3.2.4/ofi.min.js"></script>
<style>
.jumbotron {
  position:relative;
  overflow:hidden;
}
.background {
  object-fit:cover;
  position:absolute;
  top:0;
  z-index:1;
  width:100%;
  height:100%;
  opacity:0.5;
}
img.blur {
    width:100%;
    height:100%;
    -webkit-filter: blur(4px);
    filter: blur(4px);
    filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius='4');

}
.detail {
  position:relative;
  z-index:2;
  padding:2rem;
}
</style>
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
      <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
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
        <a class="nav-link" href="<?php echo url("762237345663549470", "https://lontong.herokuapp.com/login.php", "identify guilds"); ?>">Login</a>
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
<?php
echo '<div class="jumbotron">';
echo '<div class="background"><img src="'.$array['cover'].'" class="blur "></div>';
echo '<div class="detail text-white">';
echo '<h1 class="display-3">'.$array['name'].'</h1>';
echo '<p class="lead">'.$array['desc'].'</p>';
echo '</div>';
echo '</div>';
echo '<h1>Episode:</h1>';
echo '<hr>';
echo '<div class="row">';
foreach($array["episode"] as $item) {
            echo '<div class="col-4 col-sm-6">';
            echo '<div class="card mb-4 border-secondary">';
            echo '<img style="height: 100%; width: 100%; display: block;" src="'.$item["thumb"].'" alt="Card image">';
            echo '<h3 class="card-header"><a href="/episode/'.$item["id"].'">Watch '.$array['name'].' Episode '.$item['episode'].'</a></h3>';
            echo '<div class="card-body">';
            echo '<h5>'.$item["name"].'</h5>';
            echo '<h7 class="text-muted">'.$item["desc"].'</h7></div></div>';
            echo '<div class="w-100"></div>';
            echo '</div>';
}
echo '</div>';
?>
</div>
</body>
</html>
