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
        <title>ITI Indranagar CMS </title>
        
        
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/cms.js"></script>    
        <link rel="stylesheet" href="../css/cms.css"/>
        
    </head>
    <body>
        <div id="maincontainer">
            <div id="header">
                
                <table width="100%" border="0">
                    <tr>
                        <td style="font-size: 36px" align="left" valign="middle">
                            CMS: ITI Indranagar
                        </td>
                        <td align="right" valign="bottom" style="font-size:12px">
                            
                            
                            
                            <table cellspacing="0" border="0" cellpadding="5">
                                <tr>
                                    
                                    <td> 
                                        <a href="events.php?token=<?php echo $t;?>" target="cmsframe">Uploads</a>
                                    </td>
                                    <td> 
                                        <a href="staffs.php?token=<?php echo $t;?>" target="cmsframe">Staffs</a>
                                    </td>
                                    <td> 
                                        <a href="gallery.php?token=<?php echo $t;?>" target="cmsframe">Gallery</a>
                                    </td>
                                    <td>
                                        <a href="logout.php?token=<?php echo $t;?>">Logout</a>
                                    </td>
                                </tr>
                            </table>
                            
                            
                        </td>
                    </tr>
                </table>
                
                
            </div>
            <iframe id="cmsframe" name="cmsframe" src="welcome.php?token=<?php echo $t;?>"></iframe>
        </div>
    </body>
</html>
