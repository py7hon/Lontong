<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . "/discord.php";
if ($_GET['id'] && isset($_SESSION['user']) != ""){
$id                     = $_GET['id'];
$lang                   = 'enUS';
$url                    = "https://apicr.vercel.app?id=$id";
$json                   = file_get_contents($url);
$array                  = json_decode($json, true);
header_remove('x-powered-by');
?>
<!DOCTYPE html>
<html>
<head>
<title>CR - <?php echo $array['metadata']['title'];?></title>
<meta http-equiv="content-language" content="<?php echo $lang?>">
<meta charset="utf-8" />
<meta property="og:site_name" content="CR - Nonton Anime (IL/L)egal"/>
<meta property="og:type" content="tv_show"/>
<meta property="og:url" content="player.php/?id=<?php echo $id;?>"/>
<meta property="og:image" content="<?php echo $array['thumbnail']['url'];?>"/>
<meta name="title" property="og:title" content="<?php echo $array['metadata']['title'];?>">
<meta name="description" property="og:description" content="<?php echo $array['metadata']['description'];?>">
<meta prefix="moe: https://moedev.co/#" property="moe:id" content="1909082381">
<meta property="moe:developer" content="iqbalrifai"/>
<meta property="moe:name" content="cr-player"/>
<meta property="moe:discord_developer" content="bal#3530"/>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cr.moedev.co/player/player.css">
<link rel="stylesheet" type="text/css" href="https://cr.moedev.co/player/download_dialog.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div class="loading_container">
<div class="loading_icon">
<svg width="30px"  height="30px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-rolling" style="background: none;">
<circle cx="50" cy="50" fill="none" ng-attr-stroke="{{config.color}}" ng-attr-stroke-width="{{config.width}}" ng-attr-r="{{config.radius}}" ng-attr-stroke-dasharray="{{config.dasharray}}" stroke="#ffffff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138" transform="rotate(159.051 50 50)">
<animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;360 50 50" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animateTransform>
</circle>
</svg>
</div>
<div class="loading_text_container">
<div class="loading_text">Your video will start in a moment (^-^)<span class="corta_linha"></span>Waiting for stream data ...</div>
</div>
</div>
<div id="player"></div>
<script src="https://cr.moedev.co/player/jwplayer.js"></script>
<script type="text/javascript">var _0x1979=['toLowerCase','fromCharCode','charCodeAt','replace'];(function(_0x4c4dd8,_0x1979df){var _0x3747c0=function(_0x569f24){while(--_0x569f24){_0x4c4dd8['push'](_0x4c4dd8['shift']());}};_0x3747c0(++_0x1979df);}(_0x1979,0x1c0));var _0x3747=function(_0x4c4dd8,_0x1979df){_0x4c4dd8=_0x4c4dd8-0x0;var _0x3747c0=_0x1979[_0x4c4dd8];return _0x3747c0;};function burl(_0x569f24){var _0x4a9e7a=_0x3747;return(_0x569f24+'')[_0x4a9e7a('0x3')](/[a-z]/gi,function(_0x1f385a){var _0x3e512f=_0x4a9e7a;return String[_0x3e512f('0x1')](_0x1f385a[_0x3e512f('0x2')](0x0)+('n'>_0x1f385a[_0x3e512f('0x0')]()?0xd:-0xd));});};video_config = '<?php echo base64_encode(str_rot13(json_encode($array)));?>';var video_id = <?php echo $id ?>;var thumb = '<?php echo $array['thumbnail']['url']?>';var lang = '<?php echo $lang ?>';</script><script type="text/javascript" charset="ISO-8859-1">eval((function(s){var a,c,e,i,j,o="",r,t="¡¢£¤¥¦§¨©ª«¬­®¯°±²³´µ¶·¸¹º»¼½¾¿ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõö÷øùúûüýþ*KQVYZ^`|~";for(i=0;i<s.length;i++){r=t+s[i][2];a=s[i][1].split("");for(j=a.length - 1;j>=0;j--){s[i][0]=s[i][0].split(r.charAt(j)).join(a[j]);}o+=s[i][0];}return o.replace(//g,"\n").replace(//g,"\"");})([["  ­î¦'colÑ:Ãdð60pxäweë: bold-webkit-æxt-stroke: 1px bØckÙ¦'ð 18px¢¨dia¦JSON.parse(b×(aQb©c§~g)))¥­¢²ã¢subÈs_×ã ¦0¥­º¦[]¥­¢Ýã ï_È =÷È']¥fÑ(­ i¦0i <¢ª£s'].µôthi++´traiµr»( <= 4´¡º.push©12/,® +÷duraÂ'] +®/)â©Ð×.splitû/K2]*)ßí++;»}¤}adaptive¤ ¢² =¢pl.crunchyroll.com*ß»bÃak;¤ú ú¢Ý¦'#EXTM3U'Æ4112345Ç1280x728Ô0]Æ8098235Ç1920x1088Ô1]Æ2087088Ç848x4801fÔ2]Æ1090461Ç640x3601eÔ3]Æ559942Ç428x24Ï.42c015Ô4]¥©²Þ®`b|¦new B|([vo_Ý], {»tpØin¤})¥ ¢²¦URL.cÃaæObjectURL(b|) +®#.Ý¥ú $."+
"ajax({¤async: true,¤têGET,¤×:¢²,¤c§æntTxml,¤compµæ: ÚÃsp§se`nce¦Õ¬¼)¡nce.sÊup({¡®Èåï_ÈÉ~µ:¢²ÉimageåthumbÉwidthheëauQstartåfalseÉdis¬PØybackLabelåtrueÉprimaryìhtml5Élogoå{í ®~µì~µs.catbox.moe/9mlh7h.pô,í ®posiÂìbotQm-rëí}'Ãadyí(égè) != null´í  ÛgÊEµÁsByTagNameûvoK0].curÃntTime¦égèßí}íÛbody.VtÑû.loadiô_c§tain¼).styµ.dis¬¦n§e;'~rstFrameÖ¦ÛcÃaæEµÁûdiv^sÊAttribuæûcØss,®±r-·^inn¼HTML¦'<ÜMade with ❤️ by Moedev Team </Ü<br><ÜIfñ~nd any bugs, ÃpÑt § issues Q <a hÃf=mailQ:Z>Z</a"+
">.</Ü';ÛVtÑAllû.jw-ov¼Øys.jw-ÃsÊK0].appendChild(Öß$(Ö).slDown().deØy(40).slUp(ß}ß»c§st save_¬¼_time_i¦sÊI(Ú´í(gÊStaæ()Þ®¬iô´í  ésè, gÊPosiÂ()ßí}»}, 50ß¤ú }ø'%cSQp!',îø%cwhat aÃñdoiô ?.,Ùø'%cñwant use Ñ see source visit cr.moedeù fÑ moÃ inòÂ.',Ùß",
"        video_stream    ;   = onc§fig_me(video_¨dia[' +¤'\\playvar ¢m3u8_arª£s'][icreato£_urlAM-I) {le warningmessage«n#EXT¸-X-S¯ray¤  er¹TRE³NF:½PROGR³¾D=1,B¿ANDWmentti§re,RESOLUT0,FRAMEÀIDTH=ÄION=titµ,¡®etÅ-RATE=2Ë3.974,ÌCODECÍS=aÎvc1°].or,mp4a.40Ò.2'«nÓ' +º[jw¬¼(±r_·urlla¶DescCSSfuncÂ (docuÁ.span>m3u8 ==);rows_numlocalSt.ÃpØce¦¥­f§t-: te)¥c§soµ.ÊIæm©idáÑage.ype:®ight:®¡ ¶TitµCSSepisodeäsize: you fÑmaharng¢ªmÊadat¤if©Ðòtõa']['çlog(v.co} (_hls' &&ü¢Ðódsuýb_ØôÞþ Øô´;'¥­ide00,®dl.v.vclipTo/Ï.642Ï.4d4öÞ 'Õ).; cósÊ=ut¬¼Instaì1%Éêæxt/Ð×âûàb¼ifhttps://»}ß»§(', Úe´f-8rù)[toqu¼ySeµcyukag@Ypm.meßÖ.´¤­ lobfint¼val",
""]]));</script>
</body>
</html>
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
    <a class="btn btn-primary btn-lg" href="<?php echo url("762237345663549470", "https://lontong.herokuapp.com/login.php", "identify guilds"); ?>" role="button">Login</a>
  </p>
</div>
</body>
<?php } ?>
