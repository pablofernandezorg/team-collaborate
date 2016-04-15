<?php
session_start();
$username = $_SESSION['Username'];
$directory = $_GET['q'];
if($directory=="")
{ $directory = "portfolio/"; }
$logout = $_GET['logout'];
$invalid = $_GET['invalid'];

$PO_USERNAME =$_POST['username'];
$PO_PASSWORD =$_POST['password'];
$PO_FILEACCC =$_POST['file_access'];

if($logout==1)
{
session_destroy();
 ?><script>window.location="http://www.mywhitman.com/portfolio/?logout=success";</script><?php 
}
if (($username != '') && ($invalid!="permission") && ($_GET['account']!="details")) { ?><script>window.location="http://www.mywhitman.com/<?php echo $directory; ?>";</script><?php }
if (($username == '') && ($invalid=="permission") && ($_GET['account']!="details")) { ?><script>window.location="http://www.mywhitman.com/portfolio/login/?q=<?php echo $_GET['q']; ?>&level=<?php echo $_GET['level']; ?>";</script><?php }

if($PO_USERNAME!=""){
// SECURITY REQUEST SERVER 
// SECURITY REQUEST SERVER

if(!isset( $_SERVER['HTTP_REFERER']) || !strpos($_SERVER['HTTP_REFERER'],'mywhitman.com')) {
?><script> window.top.location.href = "http://mywhitman.com/portfolio/login/?q=<?php echo $PO_FILEACCC; ?>&invalid=token";  </script><?php
	exit;
}
if($_REQUEST['password']=="") {
?><script> window.top.location.href = "http://mywhitman.com/portfolio/login/?q=<?php echo $PO_FILEACCC; ?>&invalid=empty";  </script><?php exit();
    }
if($_REQUEST['username']=="") {
?><script> window.top.location.href = "http://mywhitman.com/portfolio/login/?q=<?php echo $PO_FILEACCC; ?>&invalid=empty";  </script><?php exit();
    }
$db_host		= '50.62.134.47';
$db_user		= 'myshareo_access';
$db_pass		= 'ZTB&EUnxat%,';
$db_database      	= 'myshareo_axtron'; 
$con=mysqli_connect($db_host,$db_user,$db_pass,$db_database);
// Check connection
if (mysqli_connect_errno())  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 mysql_connect($db_host,$db_user,$db_pass,$db_database) or die(mysql_error()); 
 mysql_select_db("myshareo_axtron") or die(mysql_error()); 

       if (preg_match('/[\'^£$%&*()#~?>{}<>,|=_+¬-]/', $PO_USERNAME))
           {               
?><script> window.top.location.href = "http://mywhitman.com/portfolio/login/?q=<?php echo $PO_FILEACCC; ?>&invalid=hacker";  </script><?php
                 die();
           }
       if (preg_match('/[\'^£$%&*(){}#~?><>,|=_+¬-]/', $PO_PASSWORD))
           {               
?><script> window.top.location.href = "http://mywhitman.com/portfolio/login/?q=<?php echo $PO_FILEACCC; ?>&invalid=hacker";  </script><?php
                 die();
           }       

$db_handle = mysqli_connect($db_host,$db_user,$db_pass,$db_database);
$SQL = "SELECT * FROM MyWhitman WHERE Username='$PO_USERNAME' AND Password='$PO_PASSWORD'";
$result = mysql_query($SQL);

		if($numResults= mysql_fetch_assoc($result))
		{       
			$_SESSION['Username']            =$numResults['Username'];
			$_SESSION['Name']                =$numResults['Name'];
			$_SESSION['Permission']          =$numResults['Permission'];
			$_SESSION['Directory_Only']      =$numResults['Directory_Only'];


        $DIRECTORY = explode('/', $PO_FILEACCC);     
        array_pop($DIRECTORY);                   
        $PO_FILEACCC = implode('/', $DIRECTORY); 

if($PO_FILEACCC!="")
{
?> 
<script>window.location="http://www.mywhitman.com/<?php echo $PO_FILEACCC; ?>/?username=<?php echo $_SESSION['Username']; ?>&permission=<?php echo $_SESSION['Permission']; ?>&login=success"; </script> 
<?php
}
else
{
?> 
<script>window.location="http://www.mywhitman.com/portfolio/?username=<?php echo $_SESSION['Username']; ?>&permission=<?php echo $_SESSION['Permission']; ?>&login=success"; </script> 
<?php
}
                     
                 }
                


    }

?>
                    
<!--  ALL RIGHTS RESERVED. GLOBAL SOFTWARE LLC.                      -->
<!DOCTYPE html>
<!--[if lt IE 7]>			 <html prefix="og: http://ogp.me/ns#" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>				 <html prefix="og: http://ogp.me/ns#" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>				 <html prefix="og: http://ogp.me/ns#" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html prefix="og: http://ogp.me/ns#" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1">
	<title> Login | PabloFernandez.com</title>
	<meta name="Slurp" content="NOYDIR">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//static.websimages.com/v475e501/active-static/target/external/css/base.css">
	<link rel="stylesheet" href="//static.websimages.com/v475e501/active-static/target/external/css/slim.css">
	<script src="//static.websimages.com/v475e501/active-static/lib/modernizr.js"></script>
	<meta name="decorator" content="external-slim">
<?php 
date_default_timezone_set('America/Los_Angeles');
$time = date("H"); 
if(($time >= "06") && ($time < "10"))
  {  
       $choice = rand(1,1);
       if($choice==1)  { $img_name="http://pablofernandez.com/_content/backgrounds/MORNING/MORNING1.jpg";}
}
 else if (($time >= "10") && ($time < "17"))
  { 
       $choice = rand(2,6);
       if($choice==2)  { $img_name="http://pablofernandez.com/_content/backgrounds/AFTERNOON/AFTERNOON1.jpg"; }
       if($choice==3)  { $img_name="http://pablofernandez.com/_content/backgrounds/AFTERNOON/AFTERNOON2.jpg"; }
       if($choice==4)  { $img_name="http://pablofernandez.com/_content/backgrounds/AFTERNOON/AFTERNOON3.jpg"; }
       if($choice==5)  { $img_name="http://pablofernandez.com/_content/backgrounds/AFTERNOON/AFTERNOON4.jpg"; }
       if($choice==6)  { $img_name="http://pablofernandez.com/_content/backgrounds/AFTERNOON/AFTERNOON5.jpg"; }
 }
  else if (($time >= "17") && ($time < "19"))
  { 
       $choice = rand(1,3);
       if($choice==1)  { $img_name="http://pablofernandez.com/_content/backgrounds/EVENING/EVENING1.jpg"; }
       if($choice==2)  { $img_name="http://pablofernandez.com/_content/backgrounds/EVENING/EVENING2.jpg"; }
       if($choice==3)  { $img_name="http://pablofernandez.com/_content/backgrounds/EVENING/EVENING3.jpg"; }
  }
 else if (($time >= "19") && ($time < "6"))
  { 
       $choice = rand(1,5);
       if($choice==1)  { $img_name="http://pablofernandez.com/_content/backgrounds/NIGHT/NIGHT0.jpg"; }
       if($choice==2)  { $img_name="http://pablofernandez.com/_content/backgrounds/NIGHT/NIGHT1.jpg"; }
       if($choice==3)  { $img_name="http://pablofernandez.com/_content/backgrounds/NIGHT/NIGHT2.jpg"; }
       if($choice==4)  { $img_name="http://pablofernandez.com/_content/backgrounds/NIGHT/NIGHT3.jpg"; }
       if($choice==5)  { $img_name="http://pablofernandez.com/_content/backgrounds/NIGHT/NIGHT4.jpg"; }
 }
 else
 {    
       $choice = rand(1,8);
       if($choice==1)  { $img_name="http://pablofernandez.com/_content/backgrounds/NIGHT/NIGHT0.jpg"; }
       if($choice==2)  { $img_name="http://pablofernandez.com/_content/backgrounds/NIGHT/NIGHT1.jpg"; }
       if($choice==3)  { $img_name="http://pablofernandez.com/_content/backgrounds/NIGHT/NIGHT2.jpg"; }
       if($choice==4)  { $img_name="http://pablofernandez.com/_content/backgrounds/NIGHT/NIGHT3.jpg"; }
       if($choice==5)  { $img_name="http://pablofernandez.com/_content/backgrounds/NIGHT/NIGHT4.jpg"; }
       if($choice==6)  { $img_name="http://pablofernandez.com/_content/backgrounds/NIGHT/NIGHT4.jpg"; }
       if($choice==7)  { $img_name="http://pablofernandez.com/_content/backgrounds/NIGHT/NIGHT4.jpg"; }
       if($choice==8)  { $img_name="http://pablofernandez.com/_content/backgrounds/MORNING/MORNING1.jpg"; }
 }

?>
<style>
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,font,img,kbd,q,s,samp,small,strike,sub,sup,tt,var,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td{margin:0;padding:0;border:0;outline:0;font-weight:inherit;font-style:inherit;font-size:100%;font-family:inherit;vertical-align:baseline}:focus{outline:0}body{line-height:1}ol,ul{list-style:none}table{border-collapse:separate;border-spacing:0}caption,th,td{text-align:left;font-weight:normal}blockquote:before,blockquote:after,q:before,q:after{content:""}blockquote,q{quotes:"" ""}*,*:before,*:after{-ms-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}html{padding:0;color:#999;height:100%;width:100%}body{height:100%;width:100%}a,a:visited{text-decoration:none;color:#30a8d9}b{font-weight:400}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-0.5em}sub{bottom:-0.25em}.one-col{position:relative;display:block;width:100%;clear:left;float:left}@media screen and (max-width: 767px){.one-col{float:none}}.two-col{position:relative;display:block;width:50%;float:left}@media screen and (min-width: 768px) and (max-width: 959px),screen and (min-width: 960px){.two-col:nth-child(odd){clear:left}}@media screen and (max-width: 767px){.two-col{float:none !important;width:100%;margin:0 auto}}.three-col{position:relative;display:block;width:33%;float:left}@media screen and (min-width: 960px){.three-col:nth-child(3n + 1){clear:left}}@media screen and (min-width: 768px) and (max-width: 959px){.three-col{width:50%;padding:0}.three-col:nth-child(odd){clear:left}.three-col:nth-child(odd):last-child{margin:0 auto;float:none}}@media screen and (max-width: 767px){.three-col{float:none;width:100%;margin:0 auto}}form input[type=text]::-webkit-input-placeholder,form input[type=number]::-webkit-input-placeholder,form input[type=password]::-webkit-input-placeholder,form input[type=email]::-webkit-input-placeholder,form textarea::-webkit-input-placeholder{color:#999}form input[type=text]::-moz-placeholder,form input[type=number]::-moz-placeholder,form input[type=password]::-moz-placeholder,form input[type=email]::-moz-placeholder,form textarea::-moz-placeholder{color:#999}form input[type=text]:-ms-input-placeholder,form input[type=number]:-ms-input-placeholder,form input[type=password]:-ms-input-placeholder,form input[type=email]:-ms-input-placeholder,form textarea:-ms-input-placeholder{color:#999 !important}form input[type=text]:focus::-webkit-input-placeholder,form input[type=number]:focus::-webkit-input-placeholder,form input[type=password]:focus::-webkit-input-placeholder,form input[type=email]:focus::-webkit-input-placeholder,form textarea:focus::-webkit-input-placeholder{color:#ccc}form input[type=text]:focus::-moz-placeholder,form input[type=number]:focus::-moz-placeholder,form input[type=password]:focus::-moz-placeholder,form input[type=email]:focus::-moz-placeholder,form textarea:focus::-moz-placeholder{color:#ccc}form input[type=text]:focus:-ms-input-placeholder,form input[type=number]:focus:-ms-input-placeholder,form input[type=password]:focus:-ms-input-placeholder,form input[type=email]:focus:-ms-input-placeholder,form textarea:focus:-ms-input-placeholder{color:#ccc !important}form input[type=text].placeholder,form input[type=number].placeholder,form input[type=password].placeholder,form input[type=email].placeholder,form textarea.placeholder{color:#999}form label{position:relative;display:inline-block;margin:0;padding:0 4px;text-align:center;border-radius:3px;vertical-align:bottom}form label .label{position:absolute;bottom:0;left:0;z-index:1;padding-bottom:60px;width:100%;font-size:inherit;color:#fff;border-radius:3px}form label .label~input,form label .label~.select{position:relative;z-index:2;width:100%}form label.active .label{background-color:#7cbb52;background-color:rgba(124,187,82,0.95)}form label.active .label p,form label.active .label .paragraph{visibility:visible}form label.active input[type=text],form label.active input[type=number],form label.active input[type=password],form label.active input[type=email]{background-color:#fff}form label.error .label{background-color:#f17171 !important;background-color:rgba(241,113,113,0.95) !important}form label.error .label p,form label.error .label .paragraph{visibility:visible}form label.error input{color:#f17171 !important}form label p,form label .paragraph{margin:0;padding:10px;font-size:1.7em;line-height:1.3785em;color:inherit;visibility:hidden}@media screen and (max-width: 959px){form label p,form label .paragraph{font-size:1.3em}}@media screen and (max-width: 767px){form label{width:100%}}form.emphasis label.active input[type=text],form.emphasis label.active input[type=number],form.emphasis label.active input[type=password],form.emphasis label.active input[type=email]{background-color:#fff}form.emphasis input{background-color:#f2f7f9}form.emphasis input::-webkit-input-placeholder{color:#578bb1}form.emphasis input::-moz-placeholder{color:#578bb1}form.emphasis input:-ms-input-placeholder{color:#578bb1 !important}form.emphasis input:focus{background-color:#fff}form.emphasis input:focus::-webkit-input-placeholder{color:#ccc}form.emphasis input:focus::-moz-placeholder{color:#ccc}form.emphasis input:focus:-ms-input-placeholder{color:#ccc !important}form.emphasis .select{background-color:#f2f7f9}form.emphasis .select.placeholder .text,form.emphasis .select .text{color:#578bb1}form.emphasis .select.active li.hover{background-color:#D9ECF8}form.emphasis .select.active ul li{background-color:#f2f7f9;color:#578bb1}form.horizontal,form .horizontal{margin:60px auto 0;text-align:left;padding:33px 25px;width:960px;background:#fff;border-radius:3px;font-family:'Lato',arial,sans-serif}@media screen and (max-width: 959px){form.horizontal,form .horizontal{width:100%}}@media screen and (max-width: 767px){form.horizontal,form .horizontal{text-align:center;background-color:transparent}}form.horizontal .webs-ext-btn,form .horizontal .webs-ext-btn{margin-top:1em;bottom:5px;height:54px}form.horizontal .webs-ext-btn:active,form .horizontal .webs-ext-btn:active{top:auto;bottom:4px}form.horizontal .webs-ext-btn span,form .horizontal .webs-ext-btn span{height:54px;line-height:54px}form .select>.selected,form .select ul li{padding:17px 20px}form input[type=text],form input[type=number],form input[type=password],form input[type=email]{padding:17px 20px}form .select li,form .select>.selected{font-size:1.5em}form input[type=text],form input[type=number],form input[type=password],form input[type=email]{font-size:1.5em}form .select,form .select li{color:#333;border:1px solid #ccc;border-color:rgba(0,0,0,0.2)}form input[type=text],form input[type=number],form input[type=password],form input[type=email]{color:#333;border:1px solid #ccc;border-color:rgba(0,0,0,0.2)}form .select{display:inline-block;margin-bottom:5px;background-clip:padding-box;border-radius:3px}form input[type=text],form input[type=number],form input[type=password],form input[type=email]{display:inline-block;margin:0 0 5px;background-clip:padding-box;border-radius:3px}form .select{position:relative;color:#333;cursor:pointer;text-align:left;line-height:18px;background-color:#fff;-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}form .select.placeholder>.selected span{color:#999}form .select.active{border-radius:3px 3px 0 0}form .select.active>.selected{position:relative;z-index:10;box-shadow:0 0 2px rgba(0,0,0,0.3);border-radius:3px 3px 0 0}form .select.active>.selected .handle{background-position:-82px -26px}form .select.active ul{font-size:1em;display:block}form .select.active ul li{background-color:#fff;border-bottom-color:#e9e9e9}form .select>.selected{display:block;color:inherit;padding-right:40px;border-radius:3px}form .select>.selected .text{font-size:inherit;font-weight:inherit}form .select>.selected .handle{position:absolute;right:20px;top:50%;margin-top:-3px;width:10px;height:6px;text-indent:-999em;background-image:url('../images/sprite.png');background-repeat:no-repeat;background-position:-82px -20px}form .select ul{display:none;position:absolute;top:100%;left:-1px;z-index:10;width:100%;overflow:scroll;background-color:#fff;border-radius:0 0 3px 3px;border:solid #ccc;border-width:1px 1px 0;border-color:rgba(0,0,0,0.2);border-top-color:#e9e9e9;box-shadow:0 2px 1px rgba(0,0,0,0.3);-moz-box-sizing:content-box;box-sizing:content-box;overflow-x:hidden;overflow-y:auto}form .select ul li{border-width:0 0 1px}form .select ul li.hover{background:#f6f8fb}form .hidden{position:absolute;left:-999em}form input.radio:checked,form input.checkbox:checked,form input.radio:not(:checked),form input.checkbox:not(:checked){display:none}form input.radio+.control,form input.checkbox+.control{display:none;background-image:url('../images/sprite_form.png');background-repeat:no-repeat}form input.radio:checked+.control,form input.checkbox:checked+.control,form input.radio:not(:checked)+.control,form input.checkbox:not(:checked)+.control{display:inline-block}form input.radio+.control{width:21px;height:21px}form input.radio:checked+.control{background-position:0 -41px}form input.radio[disabled]+.control{background-position:0 -21px}form input.checkbox+.control{width:16px;height:16px;background-position:-21px -2px}form input.checkbox:checked+.control{background-position:-21px -44px}form input.checkbox[disabled]+.control{background-position:-21px -23px}html.touch form .select+select{z-index:-1;left:25%;width:50%;top:10px}form.horizontal.input-group,form .horizontal.input-group{height:auto;width:auto;max-width:995px;padding:0;border:1px solid #ccc !important;box-shadow:0 1px 1px rgba(0,0,0,0.2)}form.horizontal.input-group label,form .horizontal.input-group label{margin:0;padding:0;border-radius:0;height:52px}form.horizontal.input-group label+label,form .horizontal.input-group label+label{border-left:1px solid #ccc}form.horizontal.input-group label>span,form .horizontal.input-group label>span{position:absolute;top:0;left:0;z-index:3;display:inline-block;height:52px;padding:17px 5px 17px 20px;font-weight:bold;color:#333;text-align:left}form.horizontal.input-group label>span#search-label,form .horizontal.input-group label>span#search-label{color:transparent;text-indent:-9999px}form.horizontal.input-group label>span#search-label:before,form .horizontal.input-group label>span#search-label:before{content:'';display:block;position:absolute;height:16px;width:16px;top:19px;left:21px;background:url('../images/sprite.png') -172px 0 no-repeat}form.horizontal.input-group label .select,form .horizontal.input-group label .select{padding-left:100px}form.horizontal.input-group label .select.active>.selected,form .horizontal.input-group label .select.active>.selected{box-shadow:none}form.horizontal.input-group label .select.active ul,form .horizontal.input-group label .select.active ul{box-shadow:none}form.horizontal.input-group label .select.two-column ul,form .horizontal.input-group label .select.two-column ul{border-width:1px}form.horizontal.input-group label .select.two-column ul li,form .horizontal.input-group label .select.two-column ul li{display:table;float:left;width:50%;height:3.2em;padding:0 20px;font-size:1.3em;line-height:1.3em;color:#999;border:none}form.horizontal.input-group label .select.two-column ul li span,form .horizontal.input-group label .select.two-column ul li span{display:table-cell;vertical-align:middle;font-size:inherit;font-weight:inherit;color:inherit}form.horizontal.input-group label .select.two-column ul li.hover,form .horizontal.input-group label .select.two-column ul li.hover{background:white;color:#333}form.horizontal.input-group label .select,form .horizontal.input-group label .select,form.horizontal.input-group label input,form .horizontal.input-group label input{border:none;margin:0;background:white;width:100%;height:52px}form.horizontal.input-group label>.selected,form .horizontal.input-group label>.selected,form.horizontal.input-group label input,form .horizontal.input-group label input{padding-left:5px;color:#999}form.horizontal.input-group label:first-child,form .horizontal.input-group label:first-child{border-radius:3px 0 0 3px}form.horizontal.input-group label:last-child,form .horizontal.input-group label:last-child{border-radius:0 3px 3px 0;border-right-width:1px}form.horizontal.input-group label[for='cost'],form .horizontal.input-group label[for='cost']{width:30%}form.horizontal.input-group label[for='industry'],form .horizontal.input-group label[for='industry']{width:45%}form.horizontal.input-group label[for='keyword'],form .horizontal.input-group label[for='keyword']{width:25%}form.horizontal.input-group label[for='keyword']>span,form .horizontal.input-group label[for='keyword']>span{width:50px}form.horizontal.input-group label[for='keyword'] input,form .horizontal.input-group label[for='keyword'] input{padding-left:50px}html{height:100%;z-index:1;font-family:'Lato',arial,sans-serif;font-size:62.5%;font-weight:normal}@media screen and (max-width: 767px){html{font-size:55%}}body{position:relative;height:100%;z-index:1}body a,body a:visited{color:#30a8d9;font-weight:400}h1{padding:20px 0;font-size:3.6em;line-height:1.25em}@media screen and (max-width: 767px){h1{font-size:3em}}h2{padding:20px 0 10px;color:#222;font-size:3.6em;line-height:1.25em}@media screen and (max-width: 767px){h2{font-size:3em}}h3{color:#999;font-size:2.2em;line-height:1.4em;font-weight:300}@media screen and (max-width: 767px){h3{font-size:1.8em;font-weight:400}}h4{color:#222;font-size:2.6em;line-height:1.4em}h5{color:#222;font-size:2em;line-height:1.4em}.logo{text-indent:-9999em;width:82px;height:28px;background:transparent url(../images/sprite.png) 0 0 no-repeat}.logo.logo-medium{width:120px;height:40px;background-position:0 -32px}@media only screen and (-webkit-min-device-pixel-ratio:2),only screen and (min-resolution:2dppx){.logo.logo-medium{background-position:0}}@media only screen and (-webkit-min-device-pixel-ratio:2),only screen and (min-resolution:2dppx){.logo{background-image:-webkit-linear-gradient(transparent, transparent), url(../images/logo/webs_logo.svg);background-image:linear-gradient(transparent, transparent),url(../images/logo/webs_logo.svg);background-size:contain}}span{font-size:1.6em;font-weight:300}@media screen and (max-width: 767px){span{font-weight:400}}p,.paragraph{display:block;color:#999;font-size:1.6em;line-height:1.6875em;font-weight:300}@media screen and (max-width: 767px){p,.paragraph{margin-bottom:0;font-weight:400}}ul{font-size:1.6em}b,strong{color:#666}#webs-wrapper{position:relative;width:100%;padding-top:80px;background-color:#fff;z-index:1}#webs-wrapper section{position:relative;width:100%;overflow:hidden}.section-container{position:relative;width:960px;height:auto;margin:0 auto}@media screen and (min-width: 768px) and (max-width: 959px),screen and (max-width: 767px){.section-container{width:100%;padding-left:20px;padding-right:20px}}.section-container div{position:relative}.section-container .title,.section-container .subtitle{text-align:center}.section-container.content-container{-webkit-transition:height .5s linear 0s;transition:height .5s linear 0s}.fixed{position:fixed !important}.show{display:block}.hide{display:none}.left{float:left !important}.right{float:right !important}.clearfix:before,.clearfix:after{content:" ";display:table}.clearfix:after{clear:both}.section-business{padding:50px 0 60px;background-color:#f6f8fb}.section-business .meet-tagline{clear:both;padding-top:15px}.section-business h4{margin-bottom:30px}.section-business p{margin-bottom:50px}@media screen and (max-width: 959px){.section-business img{max-width:100%}}@media screen and (max-width: 767px){.section-business{padding-top:30px}.section-business h4{margin-bottom:20px}.section-business p{margin-bottom:30px}}.section-business .image{position:relative;max-width:460px}@media screen and (max-width: 767px){.section-business .image{margin:0 auto;float:none !important}}.section-business .image.left{margin-bottom:20px}.section-business .image img{margin:0 auto;border-radius:6px}.section-business .image p{position:absolute;bottom:0;margin:0;width:100%;font-size:20px;line-height:2.5;font-weight:normal;text-align:right;padding-right:1em;color:#fff;background-color:#222;background-color:rgba(0,0,0,0.3);border-radius:0 0 7px 7px}.webs-ext-btn{display:inline-block;position:relative;padding:0;height:37px;border-radius:3px;box-shadow:inset 0 -1px 0 0 rgba(0,0,0,0.3);-webkit-transition:background-color .1s ease-in 0s;transition:background-color .1s ease-in 0s;-webkit-appearance:none;-moz-appearance:none;cursor:pointer;border:none}.webs-ext-btn:active{top:1px;box-shadow:none;-webkit-transition:background-color 0s ease-in 0s;transition:background-color 0s ease-in 0s}.webs-ext-btn span{display:block;height:37px;padding:0 25px;color:#fff;font-size:1.3em;font-weight:400;text-transform:uppercase;text-shadow:0 1px 1px rgba(0,0,0,0.1);line-height:37px}.webs-ext-btn.webs-ext-btn-arrow{height:50px;text-align:center}.webs-ext-btn.webs-ext-btn-arrow span{height:50px;line-height:50px;padding:0 35px}.webs-ext-btn.webs-ext-btn-arrow i{display:block;position:absolute;right:25px;top:19px;width:7px;height:12px;background:transparent url('../images/sprite.png') -81px -7px no-repeat}.webs-ext-btn.icon span{padding:0 35px}.webs-ext-btn.icon i{display:block;position:absolute}.webs-ext-btn.secure i{left:25px;top:18px;width:10px;height:13px;background:transparent url('../images/lock_sprite.png') 0 0 no-repeat}.webs-ext-btn.webs-ext-btn-large{height:50px}.webs-ext-btn.webs-ext-btn-large span{height:50px;line-height:50px}.webs-ext-btn.webs-ext-btn-green{background-color:#7cbb52}.webs-ext-btn.webs-ext-btn-green:hover,.webs-ext-btn.webs-ext-btn-green:focus{background-color:#94d965}.webs-ext-btn.webs-ext-btn-green:active{background-color:#7cbb52}.webs-ext-btn.webs-ext-btn-blue{background-color:#30a8d9}.webs-ext-btn.webs-ext-btn-blue:hover,.webs-ext-btn.webs-ext-btn-blue:focus{background-color:#3cbdf2}.webs-ext-btn.webs-ext-btn-blue:active{background-color:#30a8d9}.webs-ext-btn.webs-ext-btn-red{background-color:#ef6262}.webs-ext-btn.webs-ext-btn-red:hover,.webs-ext-btn.webs-ext-btn-red:focus{background-color:#f17171}.webs-ext-btn.webs-ext-btn-red:active{background-color:#ef6262}.webs-ext-btn.webs-ext-btn-grey{background-color:#eaeaea}.webs-ext-btn.webs-ext-btn-grey span{color:#000}.webs-ext-btn.webs-ext-btn-grey:hover,.webs-ext-btn.webs-ext-btn-grey:focus{background-color:#efefef}.webs-ext-btn.webs-ext-btn-grey:active{background-color:#eaeaea}.webs-ext-btn.webs-ext-btn-medgrey{background-color:#f5f5f5}.webs-ext-btn.webs-ext-btn-medgrey span{color:#999}.webs-ext-btn.webs-ext-btn-medgrey:hover,.webs-ext-btn.webs-ext-btn-medgrey:focus{background-color:#fff}.webs-ext-btn.webs-ext-btn-medgrey.webs-ext-btn-flat{border:1px solid #ccc}.webs-ext-btn.webs-ext-btn-flat{box-shadow:none}.webs-ext-btn.webs-ext-btn-flat span{text-shadow:none}.webs-ext-btn.webs-ext-btn-disabled{background-color:#ccc}.webs-ext-btn.webs-ext-btn-disabled:hover,.webs-ext-btn.webs-ext-btn-disabled:active{top:auto;box-shadow:inset 0 -1px 0 0 rgba(0,0,0,0.3);background-color:#ccc;cursor:default !important}.webs-ext-btn.webs-ext-btn-disabled span{color:#fff}.webs-ext-btn.webs-ext-btn-toggle{height:43px;box-shadow:none}.webs-ext-btn.webs-ext-btn-toggle span{display:block;height:43px;line-height:43px}.webs-ext-btn.webs-ext-btn-toggle.webs-ext-btn-blue{background-color:#ccc}.webs-ext-btn.webs-ext-btn-toggle.webs-ext-btn-blue:hover,.webs-ext-btn.webs-ext-btn-toggle.webs-ext-btn-blue:focus{background-color:#30a8d9}.webs-ext-btn.webs-ext-btn-toggle.webs-ext-btn-blue:active,.webs-ext-btn.webs-ext-btn-toggle.webs-ext-btn-blue.active{background-color:#30a8d9}.webs-ext-btn.webs-ext-btn-toggle.webs-ext-btn-green{height:50px;background-color:#fff;border:2px solid #7cbb52}.webs-ext-btn.webs-ext-btn-toggle.webs-ext-btn-green:hover,.webs-ext-btn.webs-ext-btn-toggle.webs-ext-btn-green:focus{background-color:#E1F2D6}.webs-ext-btn.webs-ext-btn-toggle.webs-ext-btn-green:active,.webs-ext-btn.webs-ext-btn-toggle.webs-ext-btn-green.active{background-color:#7cbb52}.webs-ext-btn.webs-ext-btn-toggle.webs-ext-btn-green:active span,.webs-ext-btn.webs-ext-btn-toggle.webs-ext-btn-green.active span{color:#fff}.webs-ext-btn.webs-ext-btn-toggle.webs-ext-btn-green span{height:46px;padding:0 35px;line-height:46px;color:#666;font-size:1.8em;font-weight:400;text-transform:none}@media screen and (max-width:767px),screen and (max-device-width:767px){.webs-ext-btn span{font-weight:700}}body{height:100%;background-image:url('<?php echo $img_name; ?>');background-repeat:no-repeat;background-position:top;background-size:cover}.page-login{text-align:center;font-size:1.5em}.page-login form{position:absolute;top:0;bottom:0;left:0;right:0;border:1px solid #e9e9e9;padding:50px 0 56px 0;margin:auto;background:#fff;width:400px;height:530px;border-radius:5px}.page-login .logo{display:block;margin:0 auto}.page-login input[type="text"],.page-login input[type="email"],.page-login input[type="password"]{font-size:1em;height:60px;width:325px;margin:5px;padding:10px 20px;border-radius:5px;border:1px solid #ccc}.page-login .btn{height:60px;width:325px;margin:10px 0 15px;background-color:#7cbb52;color:#fff;border:0;text-transform:uppercase;cursor:pointer}.page-login .form-upper{padding-bottom:5px;margin:0 28px;border-radius:5px}.page-login .form-lower{margin-bottom:50px}.page-login .form-footer{position:absolute;bottom:0;padding:22px 18px 18px;width:100%;background-color:#f5f5f5;border-top:1px solid #d9d9d9;border-radius:0 0 5px 5px}.page-login .form-footer p{font-size:1em;line-height:1}.page-login .form-footer p.home{position:relative;padding-top:30px}.page-login .form-footer p.home:before{content:"";position:absolute;top:15px;left:50%;width:20%;margin-left:-10%;border-top:1px solid #ddd}.page-login .default-alert .alert-subtitle{margin:15px 0 35px 0;font-size:15px;color:#ccc;text-transform:uppercase}.page-login .default-alert input{color:#333}.page-login .invalid-alert{background-color:#f06a6a}.page-login .invalid-alert .alert-subtitle{padding:15px 0 10px;width:200px;margin:auto;margin-top:10px;color:#fff}.page-login .invalid-alert input{color:#f06a6a;background-color:#fff}@media screen and (max-width: 480px){body{height:auto;background-size:auto 150%}.page-login form{position:static;width:auto;height:auto;padding:50px 0 0 0;margin:5px}.page-login input[type="text"],.page-login input[type="email"],.page-login input[type="password"],.page-login .btn{width:98%}.page-login .form-upper{margin:0 10px;height:none}.page-login .form-lower{margin:0 10px 20px 10px;height:none}.page-login .form-footer{position:relative}}
</style>	
	<meta name="description" content="Pablo Fernandez's programs, files, and coursed directory. ">
</head>
<!--http://waughrealty.com/wp-content/uploads/2013/11/black-sky-white-beach-view-nature-hd-background-wallpapers.jpg-->

<body class="slim page-login">
<form class="login-form emphasis" method="post" action="" name="relogin" novalidate>
	<a href="http://www.mywhitman.com/portfolio/"><img src="http://mywhitman.com/images/Pablo.png" height="54"></a>
  <input type="hidden" name="token" value="TOKEN1" />
        <input type="hidden" name="token2" value="TOKEN2" />
	<div class="form-upper default-alert">

<?php if($_GET['invalid']=="permission") { ?>
<br><br><h3>Access Denied</h3>
<font size="0"> <?php echo $_SESSION['Name']; ?>, unfortunately you don't have <br>authentication to access that directory.</font><br><br><br>

<?php
 } 
else if($_GET['account']=="details")
{ ?>
<br><br><h3>Account Details</h3>
<center>
<table cellspacing="6" align="center">
<tr><td>Username: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> <td><?php echo $_SESSION['Username']; ?></td></tr>
<tr><td>Name: </td> <td><?php echo $_SESSION['Name']; ?></td></tr>
<tr><td>Permission: </td> <td><?php echo $_SESSION['Permission']; ?></td></tr>
<tr><td>Directory: </td> <td><?php echo $_SESSION['Directory_Only']; ?></td></tr>
</table>
</center>
<br><br><br>
<?php
}
else
{ ?>

<?php if($_GET['q']=="") { ?><br><div class="alert-subtitle">Professional Portfolio</div><?php } else { ?>
<br><div class="alert-subtitle">This directory is protected.</div><?php } ?>	


<?php if($_GET['invalid']=="hacker") { ?><br><font color="red">Hack Attempt Blocked</font><?php } ?>
<?php if($_GET['invalid']=="empty") { ?><br><font color="red">Please check your input</font><?php } ?>
<?php } ?>


<?php if(($_GET['invalid']!="permission") && ($_GET['account']!="details")) { ?>
		<input type="text" name="username" placeholder="Username" autofocus />
		<input type="hidden" name="file_access" value="<?php echo $_GET['q']; ?>"/>
		<input type="password" name="password" placeholder="Password"/>
	</div>
	<div class="form-lower">
		<button type="submit" alt="Sign In" class="webs-ext-btn webs-ext-btn-green btn"><span>Log In</span></button>
		<div>

<?php } ?>

		</div>
<?php if(($_GET['invalid']=="permission") || ($_GET['account']=="details")) { ?><a href="javascript:history.back()">Return</a> | <?php } ?><a href="https://p3plcpnl0644.prod.phx3.secureserver.net:2083/cpsess7085602986/frontend/gl_paper_lantern/filemanager/index.html?dirselect=webroot&domainselect=snowflakeco.com&dir=%2Fhome%2Fmyshareo%2Fpublic_html/mywhitman.com/portfolio/&saveoption=1&showhidden=1">Admin Login</a>
<?php if(($_GET['invalid']=="permission") || ($_GET['account']=="details")) { ?>| <a href="?logout=1">Logout</a><?php } ?>
	</div>

	<div class="form-footer">
<p class="signup">Need to upload a file? <a href="http://www.mywhitman.com/portfolio/Public_Upload/?upload=true">Public Upload</a></p>
	</div>
</form>






<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-N4XF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','_gtmTrack','GTM-N4XF');</script>
<!-- End Google Tag Manager -->

<!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
<!--[if gt IE 8]><!--> <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js" ></script><!--<![endif]-->
<!--[if lte IE 9]><script src="//static.websimages.com/v475e501/active-static/lib/jquery.placeholder.js"></script><![endif]-->

	</body>
</html>


