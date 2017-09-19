<?php
require_once 'FileInfoService.class.php';
require_once 'AdminService.class.php';

//echo $_COOKIE['username'];
$name=$_COOKIE['username'];

echo "<font size=5 color=blue>Private Album</font>";

echo "<br/>";

$fileinfoservice = new FileInfoService();

$arr=$fileinfoservice->getTable();

if(count($arr)==0){
    echo "Nothing in your album, Post something first!";
}

for($i=0; $i<count($arr);$i++){
    if($arr[$i]['username']==$name){
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
        
    }
    
    //echo $arr[$i]['intro'];
    
}

?>