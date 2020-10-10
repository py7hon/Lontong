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
<div class="modal" style="transform: translate3d(0px, 0px, 0px);visibility: hidden;">
		   <button class="close-modal">×</button>
		   <div class="download-item">
		   	<span class="partdditem hdlabel not-copyable"><sup>Full HD</sup></span>
		   	<span class="partdditem quality not-copyable">1080p</span>
		   	<span id="1080p_down_size" class="partdditem size not-copyable">0 MB</span>
		   	<a id="1080p_down_url" class="partdditem down-icon" href="javascript:void(0);" target="_top" download></a>
		   </div>
		   <div class="download-item">
		   	<span class="partdditem hdlabel not-copyable"><sup>HD</sup></span>
		   	<span class="partdditem quality not-copyable">720p</span>
		   	<span id="720p_down_size" class="partdditem size not-copyable">0 MB</span>
		   	<a id="720p_down_url" class="partdditem down-icon" href="javascript:void(0);" target="_top" download></a>
		   </div>
		   <div class="download-item">
		   	<span class="partdditem hdlabel not-copyable"><sup></sup></span>
		   	<span class="partdditem quality not-copyable">480p</span>
		   	<span  id="480p_down_size" class="partdditem size not-copyable">0 MB</span>
		   	<a id="480p_down_url" class="partdditem down-icon" href="javascript:void(0);" target="_top" download></a>
		   </div>
		   <div class="download-item">
		   	<span class="partdditem hdlabel not-copyable"><sup></sup></span>
		   	<span class="partdditem quality not-copyable">360p</span>
		   	<span id="360p_down_size" class="partdditem size not-copyable">0 MB</span>
		   	<a id="360p_down_url" class="partdditem down-icon" href="javascript:void(0);" target="_top" download></a>
		   </div>
		   <div class="download-item">
		   	<span class="partdditem hdlabel not-copyable"><sup></sup></span>
		   	<span class="partdditem quality not-copyable">240p</span>
		   	<span id="240p_down_size" class="partdditem size not-copyable">0 MB</span>
		   	<a id="240p_down_url" class="partdditem down-icon" href="javascript:void(0);" target="_top" download></a>
		   </div>
	</div>
<div id="player"></div>
<script src="https://cr.moedev.co/player/jwplayer.js"></script>
<script type="text/javascript">var _0x1979=['toLowerCase','fromCharCode','charCodeAt','replace'];(function(_0x4c4dd8,_0x1979df){var _0x3747c0=function(_0x569f24){while(--_0x569f24){_0x4c4dd8['push'](_0x4c4dd8['shift']());}};_0x3747c0(++_0x1979df);}(_0x1979,0x1c0));var _0x3747=function(_0x4c4dd8,_0x1979df){_0x4c4dd8=_0x4c4dd8-0x0;var _0x3747c0=_0x1979[_0x4c4dd8];return _0x3747c0;};function burl(_0x569f24){var _0x4a9e7a=_0x3747;return(_0x569f24+'')[_0x4a9e7a('0x3')](/[a-z]/gi,function(_0x1f385a){var _0x3e512f=_0x4a9e7a;return String[_0x3e512f('0x1')](_0x1f385a[_0x3e512f('0x2')](0x0)+('n'>_0x1f385a[_0x3e512f('0x0')]()?0xd:-0xd));});};video_config = '<?php echo base64_encode(str_rot13(json_encode($array)));?>';var video_id = <?php echo $id ?>;var thumb = '<?php echo $array['thumbnail']['url']?>';var lang = '<?php echo $lang ?>';</script><script type="text/javascript" charset="ISO-8859-1">eval((function(s){var a,c,e,i,j,o="",r,t="¡¢£¤¥¦§¨©ª«¬­®¯°±²³´µ¶·¸¹º»¼½¾¿ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõö÷øùúûüýþ^`|~";for(i=0;i<s.length;i++){r=t+s[i][2];a=s[i][1].split("");for(j=a.length - 1;j>=0;j--){s[i][0]=s[i][0].split(r.charAt(j)).join(a[j]);}o+=s[i][0];}var p=8035;var x=function(r){var c,p,s,l='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_0123456789';if(r<63)c=l.charAt(r);else{r-=63;p=Math.floor(r/63);s=r%63;c=l.charAt(p)+l.charAt(s)}return c;};a=o.substr(p).split(':');r=a[1].split('?');a=a[0].split('?');o=o.substr(0,p);if(!''.replace(/^/,String)){var z={};for(i=0;i<185;i++){var y=x(i);z[y]=r[i]||y}t=/\b\w\w?\b/g;y=function(a){return z[a]||a};o=o.replace(t,y);}else{for(j=a[a.length-1]-1;j>=0;j--){if(r[j])o=o.replace(new RegExp('\b'+(j<63?c.charAt(j):c.charAt((j-63)/63)+c.charAt((j-63)%63))+'\b','g'),r[j])}}return o.replace(//g,"\n").replace(//g,"\"");})([["§kíR¦'color:ûd;ßJ-b2:60px;ßJ-weightÃbold; -webkit-bG-strokeÃ1pxßlack;'²ab¦'bJ-b2Ã18px;'²b¦JSON.(burl(ab(÷cæfig)))²GÝ÷subtitles_urlÝay¦0²d¦[]²aCÝI¦aO²÷dash_pålist_url_æly_ýÝNÝcÝa7¦¶bU'];§for(k i¦0; i < ±µm; i++´õýÂay <= 4´Ñd.push(º7/120000/Êä)ì)»ay++;£}Ð}õØaptiveG¦ºpl.crunchyroll.comÊÏÉ£bûak;Ð}aC¦'#EXTM3U'Û41123451280x72`Û80982351920x108ÞÛ2087088848x481fâd[2]Û1090461640x361eâd[3]Û559942428x24àa.42c015âd[4];§ÂG³´ÐkßL¦bX Blob([aC]®{£¸G/pla|8Ð}É§§G¦URL.cûaURL(bL)­#¼D"+
";$¼G({§·Ð¸c,ÐØÃG,ÐcæntTypeÃbG/xml8,ÐcompleÃûspæ´Ðkíe¦O(bM)¡ae.tup({ÑbUÃa7óbqÃGóimageÃthumbówidthóbOóaustartÃbzódispåPåbackLabelÃSóprimaryÃhtml5ólogoÃ{¥bqÃþfiles.catbox.moe/9mlh7h.png,¥positiæÃbotm-rightÑú}É£kíY¦þcrµN¼Q/bM/dØ_icæ.svgëkíH¦DØ VideoëkßE¦dØ-bT-bQës L(bV®9®af´ÑÂaf)³aO´¥azíOïbH¦af)Þ.trimô¥az(bH)Ñúús M(bZ´Ñk e¦f¼8('xtaûa')»eµx¦bZ»az eµtµm === 0 ?  Ãeµt`.nodeValue;£ús~bj´ÑkßW¦þcors-anywheû.herokuapp.com/»k R¦»kíE¦(w|dow¼_ ?ßXí_ô ÃbX Activ"+
"eX(Microsoft.XMLHTTP))»Âbj^aL¦bW­ØïaL¦Ø»}ÑaE.æûØystachange¦´¥ÂaE.ûØySta³4 &&íE.Z³200´¥§R¦aEòRespæHeØer('cænt-bm')¢ÂR³aO´¡£~S)¢}ßs {Çbv¦['Bys'®'KB'®'MB'®'GB'®'TB']¢§ÂR³0)íz 'n/a'¬i¦Int(bu.floor(buµw(R) /ßuµw(b5)))¢§Âi³0)íz R×¬aX¦(R /ßu.pow(b5®i)).Fixed(1)×ªaF).|nerText¦aX¢}¥}Ñ}ÑaE.open(HEAD®aL®S)»aE.nd(aOÉ£úÎbQ.clo-aJ¤.æclick¦´Ñðµo¦hiddenë};£síi(´ÑÂOôòEnviræmentô.OS.mobile^ðµO¦170px;¥ð.overflow¦au»}Ñðµo¦visible»w¦Oôµnô`µq»ÂOôµnô`µq.|dexOf('bL:') !== -1´¥I¦SïI¦bz»}ÑÂI³bz"+
"´¥N¦wºmasr¼DÊUµk)ìwºb4Êevs);¥c¦wìwî2]Ê¨)ºb4ÊevsÄØÃNÍtN2]¬aT¦c°Þ¬aU3]¬aV4]¬aW5]¬uùN­t¬xùT­t¬yùU­t¬zùV­t¬AùW­tªa4¹uÈuÊaZÖd¹xÈxÊa0Öe¹yÈyÊa1Öf¹zÈzÊa2Ög¹AÈAÊa3Ô)»}ÑÂI^k l¦dÞéÀB¦lìl«©®lñBÍahq¦BÁBh¬u¦aqºÏÊ¨)ªa4¹uÈuÊaZÔÀo¦d`éÀC¦oìo«©®oñCÍajs¦CÁCj¬x¦asød¹xÈxÊa0ÔÀp¦d[2]éÀD¦pìp«©®pñDÍakt¦DÁDk¬y¦atøe¹yÈyÊa1ÔÀq¦d[3]éÀE¦qìq«©®qñEÍalu¦EÁEl¬z¦auøf¹zÈzÊa2ÔÀr¦d[4]éÀF¦rìr«©®rñFÍamv¦FÁFm¬A¦avøg¹AÈAÊa3Ô)»úúae¼ddButtæ(aY®aH®ai®bEÉ£Oô.æ('ûØy'®e´ÑÂarµI(aS) !=íO´¥fòElementsByTagName(bT¤.cur"+
"ûntTime¦arµI(aS)»}Ñfµody.querySelecr(.loØ|g_cæta|er)¼I.dispå¦næeë}É£Oô.æ('firstFrame'®e´J¦f¼8(divÉJ.tAttribu(classÊcûar-messageÉJµx¦'<bp>MØe with ❤️ßy Moedev Team </bp><br><bp>IfßS f|dínyßugs®ûport æ issues  <a 6=mail:bF@pm.me>bF@pm.me</a>.</bp>';Î.jw-overås.jw-ût¤¼ppendChild(JÉ$(J).slideDownô.deå(4000).slideUp(É}É£cæst save_påer_time_|rval¦tInrval(´ÑÂOôòStaô³på|g´¥ar.tIm(aS®OôòPositiæô)»ú}®5000É§§}§}ö'%cSp!'®aRö%cwhatíûßS do|g ?.®abö'%cifßS want u or e source "+
"visití6://cr",
"       ;¡           )[0]¡    =   v.ac.aQ¤ + _¢§f.h(.j(_¢§k  + ,  +§§'\\n.j(,)b['P'];§k  == ) {.bb['Q']['§an: S,aw: b).6¦.g(;¡ .a7/­¶V']);¥$¼G¾({¥·¥);¥k «,©­aP(: ¿§¸c,¥§,¥§YÃs Å(ag®Z¡£ k ¢§m();®¦M(L(ap.ËK®'µl?Æ®ap´Çf.H(bD.¨§§¡ Ì'®''))¯#bB-X-)¢}¥}ÓaA-b)ªb[i]adÕA:ao-b_0,aM-bbÙ=1,W=Ú=b1µ¦²[1] bÜC,aB=b,a5µ0.2á'¯'­º/aa/½­/layonãbh/äaK¼çDÊ,¼xè/Uµk«¤­_;£.g( a.j(/)[»}ßs {¥Î¼J¤¼Iê,ÄØÃ.get,Ñ()ÐÂ±×µP³'É§a9µw(video_ºÏÊ¨Ö¦cÁa}£re_hls' &&trailera6://ownlo°Þ­as (teü ±×µi³bàa.4d40î2]ÊÏ)parse¦c°[Ò¬ase;ßK=utf-Ã100%àaµRâd3´£±×¼d,T=tobVµY(9­(.*)­Object§}§³S´¥[0]in m(Ø®aF®­' '­bv",
""],
[".bN.aQ for mo¼ Ø¿Ù.', ab);ñ185:¢òfig_media¢´À_àrayÂdocuÛµ¼pÚc§Ë¾tByIdÂóâµvà³»§ätF°ÆÏÌÏÐÏÇ»§fun¯³«?·_cæ¼nt¡tÆôÌôÐôÇ«³ÜèÜÌÜÐÜÇÜÄ¥?querySÝcßAÅõep_p¼mium_®ly?Êor_mÔsö§¼ó®äÎpegaStriÓhtmlDe¹£¥_÷øjwpÚyáÄsÞetadataê°tru§RESOLUTIONÞanifÔµdæaÙ?BANDWIDTHÂùccÔúãtusÂÂÂÂh¼f?¬ToÂfirÃ¬From½DÔcå?vrv?æl·Inãnc§ÚÃ¼ùlt©Øk_×çdownload_BºCâckA¯_èûÌûÐûÇçasync?PROGé?xhr³²ëcìSßöeÆüÌüÐüÇ²?ýp§æläµrowõnumbáÉ?STREAM?CODECS¢À?ÀÍ?ÝÛt_iøajaxí_to÷tipÎsýl§modìþîxêØì¥?FéE³ÑnuÅf?co½Titleå¢idÆÌÐÇÑÉ_f°bº_iòPÒ×±XMLHttpRequÔµè±Ì±Ð±Ç±×"+
"Ámp4aÍúepisoî_ÕÊe¾µòs÷§avc1?RATE?GET?èÁÌÁÐÁÇÁ000ñhàdùb_ÚÓðedõÈmpdÞ4úlength?ËPÚyâsµvisibiâý?óanêil§?els§ildNodÔ?MÒïÔëgþðrHTMLÂfìs§INF?EXT?974?dlíIøyukifö?texµðw_ÖËItemê®µàäµblob·Þoeîv?heighµ¿µbº?640028?you?viîo?ÕÖÈðwÞatþpuµID?4ñ23?ï§ÚÓevs1?10Ç",
"_playlis?video_dash¡t_down_url0p_e??params¤¨load_l¦£¥_no¦mp4¥clip0p¤oncti®©inkileSiz§­_siz§«_old¢108£¥¢t?st_chara?player0p©inkcode¢utt®ª_¬re?warningElemenformam3u8­¥???¶cter?st¼amll?i¢7224proxy?¼turnc¼atget48?httpTexµ»e¢36¦cod§ath?ng?estitl§str?108inti®lamen¦´ele?mtorarer?listaseCSSur0p?72RAM?f?loal?bºdesizne0?c®sp«¢s_agold?sus?¸_²¢ty?Ø¦¹ch",
"#$%&(*+-/<=>@JKVYZ[]{}"]]));</script>
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
