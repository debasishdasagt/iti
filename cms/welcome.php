<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include('sessionValidation.php');  
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <center>
            <br>
            <br>
            <br>
            <h2>Welcome Administrator</h2>
            <?php
            if(isset($_SESSION['err']))
            {?>
            <div style="background-color: red; padding: 5px; border-radius: 3px;color: white; font-family: calibri">
                <?php echo $_SESSION['err'];?>
            </div>
            <?php
            }
            ?>
    </center>
    </body>
</html>