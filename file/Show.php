<!-- <img src="./up/Alice/1503441006860Ban.png">
<img src="up/Alice/1503441006860Ban.png"> -->
<?php 

   require_once 'FileInfoService.class.php';

   echo "<font size=5 color=blue>Weibo Square</font>";
   
   //echo $_SERVER['DOCUMENT_ROOT'];
   echo "<br/>";
    
    $fileinfoservice = new FileInfoService();
    
    $arr=$fileinfoservice->getTable();
    
   if(count($arr)==0){
       echo "Nothing in your album, Post something first!";
   }
    
    for($i=0; $i<count($arr);$i++){
       echo "<hr/>";
       echo "<b>".$arr[$i]['username']."</b><br/>";
       echo $arr[$i]['CURRENT_TIME']."<BR/>";
       //echo "date";
       echo "<br/>";
       echo $arr[$i]['intro'];
       echo "<br/><br/>";
       echo "<img src='".$arr[$i]['Path']."'/>";
       echo "<br/>";
       echo "<hr/>";
       //echo $arr[$i]['intro'];
       
    }

   
   

?>