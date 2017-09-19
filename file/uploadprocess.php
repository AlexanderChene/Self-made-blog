<?php

require_once 'FileInfoService.class.php';
require_once 'AdminService.class.php';
//$username=$_POST['username'];
$fileinfo=$_POST['discription'];
$username=$_GET['username'];
 
//get the userid
//$adminservice=new AdminService();
//$id=$adminservice->getUserId($username);
$sql="select id from users where username='$username'";
echo $sql;
$sqlhelper=new SQLhelper();
$res=$sqlhelper->execute_dql2($sql);
if($row=mysql_fetch_assoc($res)){
    $id= $row['id'];
}else{
    echo "";
}
echo $id;
//exit();





//upload file
$fileservice = new FileInfoService();


echo $username;
echo "<br/>";
echo $fileinfo;


echo "<pre>";
    print_r($_FILES);
echo "</pre>";

$check=0;
//check size
$file_size=$_FILES['myfile']['size'];
if($file_size>2*1024*1024){
    echo "file is too big";
    ?>
    <script>
    alert("File is too big!!");
    window.location.href="Homepage.php?cat=2.php";
    </script>
    <?php
    //exit();
}

$file_type=$_FILES['myfile']['type'];
if($file_type!='image/jpg' && $file_type!='image/jpeg' && $file_type!='image/png'){
    echo "only jpg!";
    ?>
    <script>
    alert("Please At Least Upload a picture!!");
    window.location.href="Homepage.php?cat=2.php";
    </script>
    
    
    <?php 
    //header("Location:upload.php");
    //header("Location:Homepage.php?cat=2");
    //exit();
}

//give each user a dirctory

//check if uploaded successfully
if(is_uploaded_file($_FILES['myfile']['tmp_name'])){
    
    
    //transfer file to server
    
    $uploaded_file=$_FILES['myfile']['tmp_name'];
    
    //give each user a dirctory
    
    $user_path=$_SERVER['DOCUMENT_ROOT']."\\file\\up\\".$username;
    //$modified_path="./up/".$username;
    //check user exists
    //echo $user_path;
    echo "<br/>";
    if(!file_exists($user_path)){
        
        mkdir($user_path);
        
    }
    
    //$_FILES['myfile']['tmp_name']
    $file_name=$_FILES['myfile']['name'];
    $modified_file_name=time().rand(1,1000).substr($file_name,strrpos($str,"."));
    $move_to_file=$user_path."\\".$modified_file_name; 
    echo $move_to_file;
    echo "<br/>";
    //echo $modified_file_name;
    $stored_dir="up/".$username."/".$modified_file_name;
    echo $stored_dir;
    //exit();
    //echo $uploaded_file."||".$move_to_file;
    //move_uploaded_file($_FILES['myfile']['tmp_name'],$_SERVER['DOCUMENT_ROOT']);
    
    if(move_uploaded_file($uploaded_file,$move_to_file)){
        echo $_FILES['myfile']['name']."upload ok<br/>";
        $res= $fileservice->uploadFile($username, $stored_dir, $fileinfo);
        
        echo $res;

        header("Location:Homepage.php?cat=3");
    }else{
        echo "fail";
    }
    
}else{
    
    echo "fail";
}

?>