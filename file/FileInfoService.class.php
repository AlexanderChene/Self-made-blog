<?php

   require_once 'SQLhelper.class.php';
   class FileInfoService{
       
       function uploadFile($username,$path,$info,$id){
           $sql="INSERT INTO `weibo`.`filleinfo` (`username`, `Path`, `intro`) VALUES ( '".$username."', '".$path."', '".$info."');";
           $sqlhelper=new SQLhelper();
           $res= $sqlhelper->execute_dml($sql);
           $sqlhelper->close_connect();
           return $res;
           
       }
       
       function getTable(){
           $sql="SELECT * FROM weibo.filleinfo ORDER BY `CURRENT_TIME` DESC;";
           $sqlhelper=new SQLhelper();
           $res=$sqlhelper->execute_dql($sql);
           $sqlhelper->close_connect();
           return $res;
       }
   }