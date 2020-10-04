<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . "/discord.php";
?>
<?php
     if(isset($_SESSION['user'])){
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Lontong - Free Watch Anime Simulcast</title>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">Lontong</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Anime List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Simulcast Callendar</a>
      </li>
    </ul>
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
    <div class="col-sm-12 col-lg-6">
<?php
$url                    = "https://pst.moe/paste/pzpizm?format=raw";
$json                   = file_get_contents($url);
$array                  = json_decode($json, true);
foreach($array["releases"] as $item) {
        echo '<div class="card mb-4 border-secondary">';
        echo '<img style="height: 100%; width: 100%; display: block;" src="'.$item["thumb"].'" alt="Card image">';
        echo '<h3 class="card-header"><a href="'.$item["url"].'">Watch '.$item["name"].'</a></h3>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Episode: '.$item["episode"].'</h5></div></div>';
}?>
</div>
</div>
</body>
<?php }else{ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Lontong - Free Watch Anime Simulcast</title>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Lontong</a>
</nav>
<div class="jumbotron">
  <h1 class="display-3">Welcome!</h1>
  <hr class="my-4">
  <p>Login with Discord account to use the service.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="<?php echo url("", "http://localhost/login.php", "identify guilds"); ?>" role="button">Login</a>
  </p>
</div>
</body>
<?php } ?>
