<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Image Gallery</title>
        <link rel="stylesheet" href="../css/cms.css"/>
     <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/cms.js"></script>
    </head>
    <?php include('sessionValidation.php');  ?>
    <body>
    <center>
        <div style="background-color: #eeeeee; border-radius: 3px; width:500px;">
            <h3>Upload Gallery Images</h3>
            <form name="galfile" id="galfile" method="post" enctype = "multipart/form-data" action="gallery.php?token=<?php echo $t;?>">
                <input type="file" name="galim" id="galim">
                <br>
                <input type="submit" value="Upload">
                <br><br>
            </form>
            
            
            
            <?php


$errors= array();
$extensions= array("jpeg","jpg","png","bmp");
if(isset($_FILES['galim']))
{
    $name=$_FILES['galim']['name'];
    $tmpname=$_FILES['galim']['tmp_name'];
    $ext=  strtolower(end(explode(".", $name)));
    if(! in_array($ext, $extensions))
    {
        $errors[]="Unsupported File Type";
    }
    
    if(empty($errors))
    {
        $upload=move_uploaded_file($tmpname, "gallery/gallery-images/".$name);
        if(!$upload)
        {
            echo "something went wrong";
        }
        else
        {
            
               echo $name." Uploaded Successfully"; 
            
        }
        
    }
    else
    {
        print_r($errors);
    }
        
}   


?>
            
           
        </div>
        <br><br>
        
        
        <table cellspacing='1' cellpadding='5' border='0'>
            <tr>
                <th style="background-color: #eeeeee; border-radius: 3px">SL. No.</th>
                <th style="background-color: #eeeeee; border-radius: 3px">File Name</th>
                <th style="background-color: #eeeeee; border-radius: 3px">Action</th>
            </tr>
        <?php
        $c=0;
        $dir = "gallery/gallery-images/";
            if (is_dir($dir)){
              if ($dh = opendir($dir)){
                while (($file = readdir($dh)) !== false){
                    
                    if($file !== '.' and $file !== '..')
                    {$c=$c+1;
                    ?>
            <tr>
                <td align='center' style="background-color: #ebebeb; border-radius: 3px"><?php echo $c ?></td>
                <td style="background-color: #ebebeb; border-radius: 3px"><?php echo $file ?></td>
                <td align='center' style="background-color: #ebebeb; border-radius: 3px"><a href="delgalleryimage.php?file=<?php echo $file ?>&token=<?php echo $t ?>">Delete</a></td>
            </tr>
        
                  
                  <?php
                }}
                closedir($dh);
              }
            }
        ?>
        </table>
    </center>
    </body>
</html>
