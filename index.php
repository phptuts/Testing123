<?php
include 'newFunct.php';

// Connect to MySQL database
$pdo = pdo_connect_mysql();

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>test page</title>
        
        <!-- site styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/site-styles.css">
    </head>
    <body>
        
       <!-- top menu -->
       
       <table id="topMenu">
           <tr>
               <td>
                   <h1 class="siteName">Scarab Beetle</h1>
               </td>
               
                <?php

               $stmt = $pdo->query("SELECT * FROM testtable01");
          
                while ($row = $stmt->fetch()) { 
                    echo "<td class='navItem'>" . "<a href='index.php'>" . $row['testmenu1']. "</a>" . "</td>"; 
                }
                
                ?>
                   
           </tr>
       </table>
       
       <!-- body text -->
       
       
       <?php echo $row['testsubmenu1']; ?>
      
     
       <!-- timeline 
       
       <table>
           <tr>
               <td>
                   <span>
                       <button>Pre 3150 BC</button>
                       <div>
                           < ?php 
                                $stmt = $pdo->query("SELECT * FROM testtable01");
                                
                                while ($row = $stmt->fetch()) {
                                    echo "<td>" . $row['testsubmenu1'] . "</td>"; 
                                }
                           ?>
                       </div>
                   </span>
               </td>
           </tr>
           
       </table>-->
       
    </body>
</html>