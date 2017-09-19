<?php 
  require_once 'common.php';


?>
<html>
<head>
<title>Weibo</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class ="container">
<font color="blue" size="3px">welcome, <?php echo $_COOKIE['username']; ?></font><br/>


   <?php
   
       include("header.php");
   
   ?>
   <hr/>
   <div class="maincontainer">
   <?php
        if($_GET['cat']){
            $page=$_GET['cat'];
            if($page==2){
                include("upload.php");
            }else if($page==3){
                include("show.php");
            }else if($page==1){
                include("Qzone.php");
            }
        }else{
            ?><div class = "banner"><img src = "image/travel.jpg" alt="start journal" width="999px";/></div>
            			  <?php
        }
   
   ?>
   
   </div>

<div class="footer"></div>

</div>

</body>
</html>