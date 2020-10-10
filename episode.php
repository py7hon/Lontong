<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . "/discord.php";
?>
<?php
     $id                     = $_GET['id'];
     $url                    = "https://apicr.vercel.app/?id=$id";
     $json                   = file_get_contents($url);
     $array                  = json_decode($json, true);
     $actual_link            = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
     ?>
<html lang="en">
<head>
<title>Lontong - Watching <?php echo $array['metadata']['title'];?></title>
<link rel="icon" href="https://files.catbox.moe/xcncgj.png">
<meta property="og:site_name" content="Lontong"/>
<meta property="og:type" content="tv_show"/>
<meta property="og:url" content="<?php echo $actual_link?>"/>
<meta property="og:image" content="<?php echo $array['thumbnail']['url']?>"/>
<meta name="title" property="og:title" content="<?php echo $array['metadata']['title'] ?> - Watch on Lontong">
<meta name="description" property="og:description" content="<?php echo $array['metadata']['description'] ?> - Watch on Lontong">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/rrssb@1.14.0/js/rrssb.min.js" integrity="sha256-xrFsHw7ZJJpMLC2mt+vC4lrvWZjduLMR4xKpz+ICR7Q=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/rrssb@1.14.0/css/rrssb.css" integrity="sha256-s4zpIQ3pRcSZ1dlTRAD+Rwi4lJWJGm8BuPJY6WeogTY=" crossorigin="anonymous">
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
<div class="container">
    <div class="jumbotron">
    <h1><?php echo $array['metadata']['title'];?></h1>
    <hr>
    <?php if(isset($_SESSION['user'])){?>
    <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item"  src="/player/<?php echo $id?>" height="100%" width="100%" style="border:none;" scrolling="no" allowfullscreen></iframe>
    </div>
    <?php }else{ ?>
    <div class="media">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Attention_Sign.svg/1169px-Attention_Sign.svg.png" height="150" width="150" class="mr-3" alt="error">
    <div class="media-body">
    <h4 class="mt-0">NO ACCESS</h4>
    PLEASE <a href="https://discordapp.com/oauth2/authorize?response_type=code&client_id=762237345663549470&redirect_uri=https://lontong.herokuapp.com/login.php&scope=identify%20guilds&state=4394fe3f72d24e37bfd86ab6">LOG IN</a> TO VIEW VIDEOS
    </div>
    </div>
    <?php } ?>
    <hr>
    <button type="button" class="btn btn-outline-primary" onclick="goBack()">Back</button>
    <ul class="rrssb-buttons clearfix">
  <li class="rrssb-facebook">
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link ?>" class="popup">
      <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29"><path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z"/></svg></span>
      <span class="rrssb-text">facebook</span>
    </a>
  </li>
  <li class="rrssb-twitter">
    <a href="https://twitter.com/intent/tweet?text=<?php echo $actual_link ?>"
    class="popup">
      <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62a15.093 15.093 0 0 1-8.86-2.32c2.702.18 5.375-.648 7.507-2.32a5.417 5.417 0 0 1-4.49-3.64c.802.13 1.62.077 2.4-.154a5.416 5.416 0 0 1-4.412-5.11 5.43 5.43 0 0 0 2.168.387A5.416 5.416 0 0 1 2.89 4.498a15.09 15.09 0 0 0 10.913 5.573 5.185 5.185 0 0 1 3.434-6.48 5.18 5.18 0 0 1 5.546 1.682 9.076 9.076 0 0 0 3.33-1.317 5.038 5.038 0 0 1-2.4 2.942 9.068 9.068 0 0 0 3.02-.85 5.05 5.05 0 0 1-2.48 2.71z"/></svg></span>
      <span class="rrssb-text">twitter</span>
    </a>
  </li>
</ul>
    <hr>
    <div id="disqus_thread"></div>
    </div>
</div>
<script>(function() {var d = document, s = d.createElement('script');s.src = 'https://lontong.disqus.com/embed.js';s.setAttribute('data-timestamp', +new Date());(d.head || d.body).appendChild(s);})();</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</body>
</html>
