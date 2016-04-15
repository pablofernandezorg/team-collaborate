<?php
 session_start();

   $db_host		= '50.62.134.47';
   $db_user		= 'myshareo_access';
   $db_pass		= 'ZTB&EUnxat%,';
   $db_database      	= 'myshareo_axtron'; 
   $con=mysqli_connect($db_host,$db_user,$db_pass,$db_database);
    if (mysqli_connect_errno())  {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
    mysql_connect($db_host,$db_user,$db_pass,$db_database) or die(mysql_error()); 
    mysql_select_db("myshareo_axtron") or die(mysql_error()); 
    $db_handle = mysqli_connect($db_host,$db_user,$db_pass,$db_database);

 $location  = ''.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
 $shorted  = $_SERVER['PHP_SELF'];
 $redirect  = $_SERVER['PHP_SELF'];
 $username = $_SESSION['Username'];

if(($location=="www.mywhitman.com/portfolio/index.php") || ($location=="www.mywhitman.com/portfolio/Public_Upload/index.php") || ($location=="www.mywhitman.com/portfolio/upload/"))
{ 

$SQL = "SELECT * FROM MyWhitman WHERE Username='$username'";
$result = mysql_query($SQL);

		if($numResults= mysql_fetch_assoc($result))
		{       
			$Official_Username           =$numResults['Username'];
		        $Official_Permission         =$numResults['Permission'];
		        $Official_Restriction        =$numResults['Directory_Only'];
		        $Official_Name               =$numResults['Name'];
                        $Official_Restriction_Array  = explode('/', $Official_Restriction);
                 }
} 
else
{
$SQL = "SELECT * FROM MyWhitman WHERE Username='$username'";
$result = mysql_query($SQL);

       if ($username == '')
       {
          header("Location: http://www.mywhitman.com/portfolio/login/?q=$shorted");
       }
 
		if($numResults= mysql_fetch_assoc($result))
		{       
			$Official_Username           =$numResults['Username'];
		        $Official_Permission         =$numResults['Permission'];
		        $Official_Restriction        =$numResults['Directory_Only'];
		        $Official_Name               =$numResults['Name'];
                        $Official_Restriction_Array  = explode('/', $Official_Restriction);
                 }

             $Official_Restriction = str_replace('/', '', $Official_Restriction);
             $Official_Restriction = str_replace('index.php', '', $Official_Restriction);
             $shorted = str_replace('/', '', $shorted);
             $shorted = str_replace('index.php', '', $shorted);

           $pos = strpos($Official_Restriction, $shorted); 
           if ($pos === false) { 
                if($Official_Permission=="5") 
                     {  // ACCESS IS OK. ADMINISTRATOR 
                     } 
                else {
             if($Official_Permission=="") { $Official_Permission ="0"; }

     if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: ".$_SERVER["HTTP_REFERER"]."?invalid=permission&level=$Official_Permission&q=$redirect");
    } else { 
       header("Location: http://www.mywhitman.com/portfolio/login/?invalid=permission&level=$Official_Permission&q=$redirect"); 
    }
                     }
          } else { 
      // ACCESS IS OK. STILL WITHIN SCOPE AVAILABLE TO THIS USER
                 }
    }

?>
<?php
   if(isset($_FILES['upload'])){
      $errors= array();
      $file_name = $_FILES['upload']['name'];
      $file_size =$_FILES['upload']['size'];
      $file_tmp =$_FILES['upload']['tmp_name'];
      $file_type=$_FILES['upload']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['upload']['name'])));
      
      $expensions= array("cpp","py", "txt", "dat", "html", "php", "gif", "pdf", "pyde");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="File not allowed, please choose an allowed file. (CPP, PY, PYDE, TXT, DAT, HTML, PHP, GIF, PDF)";
      }

      if($file_size > 2097152){
         $errors[]='File size must be less then 2 MB';
      }

      if(empty($errors)==true){

    if (!is_file($file_name)) {
         $location = ''.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
         if($location=="www.mywhitman.com/portfolio/index.php") {  move_uploaded_file($file_tmp, "Public_Upload/".$file_name); }
         else { move_uploaded_file($file_tmp, "".$file_name);   }
              }
     else
     {
// *******************************************************************************************
    $matched_number = "0";
    preg_match_all('/\d+/', $file_name, $matches);
    $matched_number = $matches[0][0];
    if($matched_number=="") { $matched_number = "0"; }
    $matched_number ++;
    $new_file = preg_replace('/[0-9]+/', '', $file_name);
    $parts = (explode(".",$new_file));
    $new_file = $parts[0] . $matched_number . "." . $parts[1];
    $file_name = $new_file;
// **********************************
     if (is_file($new_file)) {
         $location = ''.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
         if($location=="www.mywhitman.com/portfolio/index.php") {    move_uploaded_file($file_tmp, "Public_Upload/".$new_file); }
         else { move_uploaded_file($file_tmp, "".$new_file); }

}
else 
{

 ?><script>window.location="?failure=true&rename=attempted";</script><?php

}
// **********************************
// *******************************************************************************************

}

    $location = ''.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    if($location=="www.mywhitman.com/portfolio/index.php") { 
         ?><script>window.location="http://www.mywhitman.com/portfolio/Public_Upload/?uploaded=true&success=<?php echo $file_name; ?>&rename=success";</script><?
                                                        }
    else   {
         ?><script>window.location="?uploaded=true&success=<?php echo $file_name; ?>&rename=success";</script><?
                                                        }
      }else{

         print_r("<center><div style='background:#FE2E2E;'><br><font color='white'>Error: ");
         print_r($errors);
         print_r("</font><br><br></div></center>");
      }
   }

if($_GET['logout']=="success")
{
         print_r("<center><div style='background:#3EA055;'><br><font color='white'>Success: ");
         print_r("You have been logged out. ");
         print_r("</font><br><br></div></center>");
}
if(($_GET['login']=="success") && ($Official_Username!=""))
{
         print_r("<center><div style='background:#3EA055;'><br><font color='white'>Success: You have been granted ");
         if($Official_Permission=="1") { print_r("access to specific files. ");} 
         if($Official_Permission=="2") { print_r("access to some files. ");} 
         if($Official_Permission=="3") { print_r("access to some directories. "); } 
         if($Official_Permission=="4") { print_r("access to most files. "); } 
         if($Official_Permission=="5") { print_r("administrative access to all files. "); } 
         print_r("</font><br><br></div></center>");
}
if($_GET['uploaded']=="true")
{
         print_r("<center><div style='background:#3EA055;'><br><font color='white'>Success: Your file has been uploaded ");
         print_r("</font><br><br></div></center>");
}
if($_GET['failure']=="true")
{
         print_r("<center><div style='background:#FE2E2E;'><br><font color='white'>Error: The file already exists in the directory.");
         print_r("</font><br><br></div></center>");
}
if($_GET['invalid']=="permission")
{
         print_r("<center><div style='background:#FE2E2E;'><br><font color='white'>Access Denied: $Official_Name, unfortunately you don't have authentication to access that directory.");
         print_r("</font><br><br></div></center>");
}
?>
<!DOCTYPE html>
<html class="no-js">
<head>
<style>
* {
	padding:0;
	margin:0;
}

#container2 {
	color: #333;
	font: 14px Sans-Serif;
	padding: 50px;
 	//background: #eee;

}

h1 {
	text-align: center;
	padding: 20px 0 12px 0;
	margin: 0;
}
h2 {
	font-size: 16px;
	text-align: center;
	padding: 0 0 12px 0; 
}

#container {
	box-shadow: 0 5px 10px -5px rgba(0,0,0,0.5);
	position: relative;
	background: white; 
}

</style>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1,requiresActiveX=true">

<title> Pablo Fernandez :: The Young Entrepreneur :: Professional Resume </title>
<meta name="description" content="Born in Pasadena, CA, Pablo Fernandez is known as a young entrepreneur and web developer because of his passion for designing websites and turning his ideas into startup companies.">
    
    <!-- /// Favicons ////////  -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="hhttps://cdn3.iconfinder.com/data/icons/buttons/512/Icon_13-512.png">
    <link rel="shortcut icon" href="https://cdn3.iconfinder.com/data/icons/buttons/512/Icon_13-512.png">

	<!-- /// Template CSS ////////  -->
    <link rel="stylesheet" href="http://www.pablofernandez.com/_layout/css/base.css">
    <link rel="stylesheet" href="http://www.pablofernandez.com/_layout/css/grid.css">
    <link rel="stylesheet" href="http://www.pablofernandez.com/_layout/css/elements.css">
    <link rel="stylesheet" href="http://www.pablofernandez.com/_layout/css/layout.css">

	<!-- /// JS Plugins CSS ////////  -->
    <link rel="stylesheet" href="http://www.pablofernandez.com/_layout/js/bxslider/jquery.bxslider.css">
    <link rel="stylesheet" href="http://www.pablofernandez.com/_layout/js/magnificpopup/magnific-popup.css">
    
	<!-- /// Skin CSS ////////  -->
	<!-- <link rel="stylesheet" href="_layout/css/skins/default.css">  -->
	
    <!-- /// Google Fonts ////////  -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:400,700">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700">
    
    <!-- /// FontAwesome Icons 4.0.3 ////////  -->
	<link rel="stylesheet" href="http://www.pablofernandez.com/_layout/css/fontawesome/font-awesome.min.css">
    
    <!-- /// Custom Icon Font ////////  -->
    <link rel="stylesheet" href="http://www.pablofernandez.com/_layout/css/iconfontcustom/icon-font-custom.css">
    
    <!-- /// Cross-browser CSS3 animations ////////  -->
    <link rel="stylesheet" href="http://www.pablofernandez.com/_layout/css/animate/animate.min.css">

    <!-- /// Modernizr ////////  -->
    <script src="http://www.pablofernandez.com/_layout/js/modernizr-2.6.2.min.js"></script>
 
</head>
<body>
	<div id="pageloader">
		<div class="loader-img">
        
			<img src="http://www.pablofernandez.com/_layout/images/loader.gif" alt=""> 
		
        </div><!-- end .loader-img -->
	</div><!-- end .pageloader -->
 
	<div id="wrap">
        
           <div id="header">
            <div id="nav">
        
                <div class="row">
                    <div class="span3">
                    
                        <!-- // Logo // -->
                        <a href="http://mywhitman.com/portfolio/" id="logo">
                           Pablo Fernandez
                        </a>
                    
                    </div><!-- end .span3 -->
                    <div class="span9">
                    
                        <a href="#" id="mobile-menu-trigger">
                            <i class="fa fa-bars"></i>
                        </a>
                        
                        <!-- // Menu // -->
                        <ul class="sf-menu" id="menu">

<li>
                                <a href="http://cs.mywhitman.com">Whitman CS</a>
                            </li>

<li>
                                <a href="http://pablofernandez.com">Resume</a>
                            </li>
                            <li>
                                <a href="http://www.mywhitman.com/portfolio/">Directory</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://github.com/pablofernandezcom">Github</a>
                            </li>

                            <li>
                                <a href="?upload=true">Upload</a>
                            </li>
                          
<?php if($Official_Username=="") { ?>
   <li>
                                <a href="http://www.mywhitman.com/portfolio/login/">Login</a>
                            </li>
<?php } else { ?>
   <li>
                                <a href="http://www.mywhitman.com/portfolio/login/?logout=1">Hi, <?php echo $Official_Name; ?> ( Logout)</a>
                            </li>
<?php } ?>


                        
                        </ul>
    
                    </div><!-- end .span9 -->
                </div><!-- end .row -->	
                
			</div><!-- end #nav -->

		<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

		</div><!-- end #header -->
		<div id="content">
		
		<!-- /// CONTENT  /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->						
<?php 
 $Directory_Only = getcwd();
 $Directory_Only = substr($Directory_Only, strrpos($Directory_Only, '/') + 1);

$Previous_Directories = getcwd();
$Previous_Directories = str_replace("/home/myshareo/public_html/","",$Previous_Directories);
$Previous_Directories = str_replace($Directory_Only,"",$Previous_Directories);
$Previous_Directories = substr($Previous_Directories, 0, -1);
$Temporary_Name_Only = substr($Previous_Directories, strrpos($Previous_Directories, '/') + 1);

$Previous_Directories_2 = str_replace("/home/myshareo/public_html/","",$Previous_Directories);
$Previous_Directories_2 = str_replace($Temporary_Name_Only,"",$Previous_Directories_2);
$Previous_Directories_2 = substr($Previous_Directories_2, 0, -1);
$Temporary_Name_Only_2 = substr($Previous_Directories_2, strrpos($Previous_Directories_2, '/') + 1);
if(($Temporary_Name_Only_2=="ywhitman.com") || ($Temporary_Name_Only_2=="ywhitman.co")) { $Temporary_Name_Only_2=""; }

$Previous_Directories_3 = str_replace("/home/myshareo/public_html/","",$Previous_Directories_2);
$Previous_Directories_3 = str_replace($Temporary_Name_Only_2,"",$Previous_Directories_3);
$Previous_Directories_3 = substr($Previous_Directories_3, 0, -1);
$Temporary_Name_Only_3 = substr($Previous_Directories_3, strrpos($Previous_Directories_3, '/') + 1);
if(($Temporary_Name_Only_3=="ywhitman.com") || ($Temporary_Name_Only_3=="ywhitman.co")) { $Temporary_Name_Only_3=""; }

if($location=="www.mywhitman.com/portfolio/index.php")
{ ?>
		<!-- /// CONTENT  /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->						
<div style="background:#2B3856;"><br>
  <center><h1><font color="white">Code Portfolio</font></h1></center>
<?php if($Official_Username=="") { ?>
    <center><font color="white"> Programming research, projects, open source work, and business ventures.<br>  Authentication required for certain files. </font></a>
<?php } else { ?>
    <center><font color="white">Programming research, projects, open source work, and business ventures.<br>
<?php } ?>
		<!-- /// CONTENT  /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->						
<?php } else { ?>
		<!-- /// CONTENT  /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->						
<div style="background:#2B3856;"><br>
  <center><h1><font color="white"><?php $Directory_Only = ucfirst($Directory_Only); echo $Directory_Only; ?></font></h1>

<font color="white">/&nbsp;&nbsp;</font>
<a href="http://www.<?php echo $Previous_Directories_3; ?>"><font color="white"><?php echo ucfirst($Temporary_Name_Only_3); ?></font></a>
<?php if($Temporary_Name_Only_3!="") { echo "<font color='white'>&nbsp;&nbsp;/&nbsp;&nbsp;</font>"; } ?>
<a href="http://www.<?php echo $Previous_Directories_2; ?>"><font color="white"><?php echo ucfirst($Temporary_Name_Only_2); ?></font></a>
<?php if($Temporary_Name_Only_2!="") { echo "<font color='white'>&nbsp;&nbsp;/&nbsp;&nbsp;</font>"; } ?>
<font color="white"><a href="http://www.<?php echo $Previous_Directories; ?>"><font color="white"><?php echo ucfirst($Temporary_Name_Only); ?></font></a>
<?php if($Temporary_Name_Only!="") { echo "<font color='white'>&nbsp;&nbsp;/&nbsp;&nbsp;</font>"; } ?>




  </center>
<?php if($Official_Username=="") { ?>
    <center><font color="white">Authentication required for certain files. </font></a>
<?php } else { ?>
<?php } ?>
		<!-- /// CONTENT  /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->						
<?php } ?>

<?php if($_GET['upload']=="true") { ?>
<br><div class="callout-box">
<div class="row">
<center><form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="upload" style="color:white;">
<input type="submit" value="Upload" style="color:white;"></form></center>
</div><!-- end .row --></div><!-- end .callout-box --><?php } ?>

<div id="container2">
<div id="container"> 

    <table class="sortable">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th><font color="white">Filename</font></th>
          <th><font color="white">Type</font></th>
          <th><font color="white">Size <small>(bytes)</small></font></th>
          <th><font color="white">Date Modified</font></th>
        </tr>
      </thead>
      <tbody>
      <?php
        // Opens directory
        $myDirectory=opendir(".");
        
        // Gets each entry
        while($entryName=readdir($myDirectory)) {
          $dirArray[]=$entryName;
        }
        
        // Finds extensions of files
        function findexts ($filename) {
          $filename=strtolower($filename);
          $exts=split("[/\\.]", $filename);
          $n=count($exts)-1;
          $exts=$exts[$n];
          return $exts;
        }
        
        // Closes directory
        closedir($myDirectory);
        
        // Counts elements in array
        $indexCount=count($dirArray);
        
        // Sorts files
        sort($dirArray);
        
        // Loops through the array of files
        for($index=0; $index < $indexCount; $index++) {
           
          // Allows ./?hidden to show hidden files
     
          if($_SERVER['QUERY_STRING']=="hidden")
          {$hide="";
          $ahref="./";
          $atext="Hide";}
          else
          {$hide=".";
          $ahref="./?hidden";
          $atext="Show";}

          if(substr("$dirArray[$index]", 0, 1) != $hide) {
        
          // Gets File Names
          $name=$dirArray[$index];
          $namehref=$dirArray[$index];
          
          // Gets Extensions 
          $extn=findexts($dirArray[$index]); 
          
          // Gets file size 
          $size=number_format(filesize($dirArray[$index]));
          
          // Gets Date Modified Data
          $modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
          $timekey=date("YmdHis", filemtime($dirArray[$index]));
          
          // Prettifies File Types, add more to suit your needs.
          switch ($extn){
            case "png": $extn="PNG Image"; break;
            case "jpg": $extn="JPEG Image"; break;
            case "svg": $extn="SVG Image"; break;
            case "gif": $extn="GIF Image"; break;
            case "ico": $extn="Windows Icon"; break;
            case "txt": $extn="Text File"; break;
            case "log": $extn="Log File"; break;
            case "htm": $extn="HTML File"; break;
            case "php": $extn="PHP Script"; break;
            case "js": $extn="Javascript"; break;
            case "css": $extn="Stylesheet"; break;
            case "pdf": $extn="PDF Document"; break;

            case "zip": $extn="ZIP Archive"; break;
            case "bak": $extn="Backup File"; break;
            
            default: $extn=strtoupper($extn)." File"; break;
          }
          
          // Separates directories
          if(is_dir($dirArray[$index])) {
            $extn="&lt;Directory&gt;"; 
            $size="N/A"; 
            $class="dir";
          } else {
            $class="file";
          } 

          $noprint="false";
          // Cleans up . and .. directories 
          if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;";}
          if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}
          if($name=="index.php"){$noprint="true";}
          if($name=="error_log"){$noprint="true";}
          if($name=="login"){$noprint="true";}
          if($name=="upload"){$noprint="true";}
          if($name=="account"){$noprint="true";}
          if($name=="Backup"){$noprint="true";}


  if($noprint!="true") {
          ?>
          <tr class='<?php echo $class; ?>'>
<td>
<?php $success = $_GET['success']; if($success==$name) { ?>
<!--https://cdn2.iconfinder.com/data/icons/picons-basic-2/57/basic2-277_new_badge-512.png-->
&nbsp;&nbsp;&nbsp;<img height="27" src="https://cdn2.iconfinder.com/data/icons/picons-basic-2/57/basic2-081_new_badge-512.png">
<?php } ?></td>
            
<td>
<?php if(in_array($name, $Official_Restriction_Array)) { ?>
    <img height="22" src="http://www.mywhitman.com/images/SUCC.png">
<?php } else { 
                   if ((strpos($name, ".") !== false) || ($name=="Public_Upload") || ($name=="upload") || ($Official_Permission=="5")) { ?>
                          <img height="22" src="http://www.mywhitman.com/images/SUCC.png">
                                                     <?php  }  else { ?>
                          <img height="17" src="http://www.mywhitman.com/images/LOCK.png">
                                                     <?php  } ?>
      <?php  } ?>
</td>
            <td style="text-align:left;"><a href='./<?php echo $namehref; ?>'><font color="black"><?php echo $name; ?></font></a></td>
            <td><?php 
if($name=="Public_Upload") { echo "&lt;Public Directory&gt;"; }
else if($name=="upload") { echo "&lt;Public Upload&gt;"; } 
else { echo $extn; }  ?></td>
            <td><?php echo $size; ?></td>
            <td sorttable_customkey='<?php echo $timekey; ?>'><?php echo$modtime; ?></td>
          </tr><?php
          } }

        }
      ?>
      </tbody>
    </table>
  
    <!--<h2><?php print("<a href='$ahref'>$atext hidden files</a>"); ?></h2>-->

  </div>

    <center><font color="white">Copyright Pablo Fernandez &copy; 2016. www.pablofernandez.com. <br>Directory access is restricted to only employers, professors, and lab partners.</font>


  
</body>

</html>


                                    
                </div>

</div>



		</div><!-- end #content -->
		
	</div><!-- end #wrap -->
    
    <a id="back-to-top" href="#">
    	<i class="ifc-up4"></i>
    </a>


    <!-- /// jQuery ////////  -->
	<script src="http://www.pablofernandez.com/_layout/js/jquery-2.1.0.min.js"></script>
  
    <!-- /// ViewPort ////////  -->
	<script src="_layout/js/viewport/jquery.viewport.js"></script>
    
    <!-- /// Easing ////////  -->
	<script src="http://www.pablofernandez.com/_layout/js/easing/jquery.easing.1.3.js"></script>

    <!-- /// SimplePlaceholder ////////  -->
	<script src="http://www.pablofernandez.com/_layout/js/simpleplaceholder/jquery.simpleplaceholder.js"></script>

    <!-- /// Fitvids ////////  -->
    <script src="http://www.pablofernandez.com/_layout/js/fitvids/jquery.fitvids.js"></script>
    
    <!-- /// Superfish Menu ////////  -->
	<script src="http://www.pablofernandez.com/_layout/js/superfish/hoverIntent.js"></script>
    <script src="http://www.pablofernandez.com/_layout/js/superfish/superfish.js"></script>
    
    <!-- /// bxSlider ////////  -->
	<script src="http://www.pablofernandez.com/_layout/js/bxslider/jquery.bxslider.min.js"></script>
    
   	<!-- /// Magnific Popup ////////  -->
	<script src="http://www.pablofernandez.com/_layout/js/magnificpopup/jquery.magnific-popup.min.js"></script>
    
    <!-- /// Isotope ////////  -->
	<script src="_layout/js/isotope/isotope.pkgd.min.js"></script>
    <script src="http://www.pablofernandez.com/_layout/js/isotope/imagesloaded.pkgd.min.js"></script>
    
    <!-- /// Parallax ////////  -->
	<script src="http://www.pablofernandez.com/_layout/js/parallax/jquery.parallax.min.js"></script>
	
	<!-- /// EasyPieChart ////////  -->
	<script src="http://www.pablofernandez.com/_layout/js/easypiechart/jquery.easypiechart.min.js"></script>
    
    <!-- /// Easy Tabs ////////  -->
    <script src="http://www.pablofernandez.com/_layout/js/easytabs/jquery.easytabs.min.js"></script>	
	
    <!-- /// Waypoints ////////  -->
    <script src="http://www.pablofernandez.com/_layout/js/waypoints/waypoints.min.js"></script>
    <script src="http://www.pablofernandez.com/_layout/js/waypoints/waypoints-sticky.min.js"></script>
    
    <!-- /// Form validate ////////  -->
    <script src="http://www.pablofernandez.com/_layout/js/jqueryvalidate/jquery.validate.min.js"></script>
    
	<!-- /// Form submit ////////  -->
    <script src="http://www.pablofernandez.com/_layout/js/jqueryform/jquery.form.min.js"></script>
    
    <!-- /// gMap ////////  -->
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="http://www.pablofernandez.com/_layout/js/gmap/jquery.gmap.min.js"></script>
    
    <!-- /// Scrollspy ////////  -->
    <script src="http://www.pablofernandez.com/_layout/js/scrollspy/scrollspy.min.js"></script>

	<!-- /// Custom JS ////////  -->
	<script src="http://www.pablofernandez.com/_layout/js/custom.js"></script>	

</body>
</html>