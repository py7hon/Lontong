<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . "/discord.php";
?>
<?php
     if(isset($_SESSION['user'])){
     $id                     = $_GET['id'];
     $url                    = "https://apicr.vercel.app/?id=$id";
     $json                   = file_get_contents($url);
     $array                  = json_decode($json, true);
     ?>
<html lang="en">
<head>
<title>Lontong - Watching <?php echo $array['metadata']['title'];?></title>
<link rel="icon" href="https://files.catbox.moe/xcncgj.png">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css">
<script>function goBack() {window.history.back();}</script>
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
        <a class="nav-link" href="/anime-list.php">Anime List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Simulcast Callendar</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="nav-item">
        <a class="nav-link" href="/logout.php">Logout</a>
      </li>
    <ul>
  </div>
</nav>
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Warning!</h4>
  <p class="mb-0">If you have a bugs please contact <a href="mailto:yukifag@pm.me" class="alert-link">yukifag@pm.me</a>.</p>
</div>
<div class="container">
    <div class="jumbotron">
    <h1><?php echo $array['metadata']['title'];?></h1>
    <hr>
    <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item"  src="player.php?id=<?php echo $id?>" height="100%" width="100%" style="border:none;" scrolling="no" allowfullscreen></iframe>
    </div>
    <hr>
    <button type="button" class="btn btn-outline-primary" onclick="goBack()">Back</button>
    </div>
</div>
</body>
<?php }else{ 
header('Location: /');
} ?>
