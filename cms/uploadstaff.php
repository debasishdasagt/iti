<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include('sessionValidation.php');  
//include '../config.php';
$extensions=array("jpg","png","jpeg","bmp","pdf","doc","docx");
if(isset($_FILES['staffpic']))
{
    $name=$_FILES['staffpic']['name'];
    $tmpfilename=$_FILES['staffpic']['tmp_name'];
    $ext=  strtolower(end(explode('.',$name)));
    if(!in_array($ext, $extensions))
    {
        header("Location: staffs.php?a=0");
       
    }
    else
   
        {
            $upload=move_uploaded_file($tmpfilename,"uploads/staffs/".$name);
            $s1="update staffs set status='D'";
            $s="insert into staffs(status,file_path) values('C','uploads/staffs/$name')";
            $dbdisable=mysql_query($s1, $conn);
            $dbentry=  mysql_query($s, $conn);
            if($dbentry)
            {
                header("Location: staffs.php?a=1&token=$t");
            }
            else
            {
                header("Location: staffs.php?a=0&token=$t");
                
            }
        }
    }

?>
