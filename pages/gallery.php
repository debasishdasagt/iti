<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ITI Image Gallery</title>
        <style type="text/css">
            body{
                background-color:#006666;
                
            }
            .thumbnail
            {
                width: 180px;
                height: 135px;
                border: 5px solid white;
                border-radius: 3px;
                box-shadow: 0px 0px 5px #000000;
                cursor: pointer;
                z-index: 2;
            }
            .thumbnail:hover
            {
                width: 170px;
                height: 125px;
                border: 10px solid  #009966;
            }
            
            #imag
            {
                position:absolute;
                z-index: 3;
                width: 90%;
                min-height: 300px;
                background: rgba(0,0,0,0.8);
                left: 30px;
                top:30px;
                border-radius: 5px;
                padding:10px;
                visibility:hidden;
            }
            #imag a
            {
                color: white;
                text-decoration: none;
            }
            
            #imag a:hover
            {
                color: red;
            }
            #gh
            {
                text-align: right;
                font-family: 'calibri';
                
            }
        </style>
        
        <script type="text/javascript">
            function showimage(a)
            {
                document.getElementById('im').src=a;
                document.getElementById('imag').style="visibility:visible";
            }
            
            function hideimage()
            {
                document.getElementById('imag').style="visibility:hidden";
            }
            </script>
        
        
    </head>
    <body>
   
        <div id="imag">
            <div id="gh"><a href="javascript:hideimage()">Close</a></div><br>
            <img id="im" style="width:100%">
        </div>
        <div style="position:absolute;z-index: 1; left: 30px;">
            <table width="90%" cellspacing="15" cellpadding="0" border="0"><tr>
            <?php
        $c=0;
        $dir = "../cms/gallery/gallery-images/";
            if (is_dir($dir)){
              if ($dh = opendir($dir)){
                while (($file = readdir($dh)) !== false){
                    
                    if($file !== '.' and $file !== '..')
                    {
                        
                        if($c == 3)
                        {echo "</tr><tr>";
                        $c=0;
                        }
                        $c=$c+1;
                    ?>
            
                    <td><img src='<?php echo $dir.$file; ?>' class='thumbnail' onclick='showimage(this.src)'></td>
                  
                  <?php
                  
                }}
                closedir($dh);
              }
            }
        ?>
            
                </tr>   
        </table>
        </div>
        
        
  
    </body>
</html>
