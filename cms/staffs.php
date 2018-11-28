<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include('sessionValidation.php');  
//include '../config.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Staffs</title>
        <link rel="stylesheet" href="../css/cms.css"/>
     <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/cms.js"></script> 
    </head>
    <body>
        
        <center>
            
            <div style="width: 500px;">
               
                    <br>
                    <br>
                    
                    <?php
            if(isset($_GET['a']))
            {
                if($_GET['a']==='1')
                {
                    ?>
            <span style="color: green; font-weight: bold">File uploaded successfully</span>
                   <?php
                }
                   else
                   {
                       ?>
            <span style="color: red; font-weight: bold">Something went wrong</span>
            <?php
                   }
            }
            ?>
                    <form id="picuploader" name="picuploader" action="uploadstaff.php?token=<?php echo $t;?>" method="post" enctype = "multipart/form-data">
                        
                   
                    <table style='background-color: #eeeeee'>
                        <caption>Upload Staff Information</caption>
                        <tr>
                            <td colspan="2">
                                
                            </td>
                            <td align="center" id="s_block_td">
                               
                            </td>
                            <td align="center" id="s_pic_td">
                                
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div>
                                <input type="file" name="staffpic" id="staffpic">
                                </div>
                            </td>
                            <td colspan="2" align="center">
                                <input type="submit" value="Upload">
                            </td>
                        </tr>
                    </table>
                    
                    </form> 
                
            </div>
    </center>
    </body>
</html>
