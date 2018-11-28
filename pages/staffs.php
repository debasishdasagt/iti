<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Staffs</title>
        <link rel="stylesheet" type="text/css" href="../css/child_page.css">
    </head>
    <body>
        <center>
        <div id="staff_banner"></div>
    </center>
    <br>
        <?php
        include '../config.php';
        $staffs="select * from staffs where status='C'";
        $sel_staff=mysql_query($staffs,$conn);
        
        $s=mysql_fetch_array($sel_staff);
        
        
        
        ?>
    <iframe src="../cms/<?php echo $s['file_path']?>" style="width: 100%; height: 600px" border="0"></iframe>
    
        
        <br><br>
        
    </body>
</html>
