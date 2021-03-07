<?php
include 'newFunct.php';

// Really great job learning and practicing all this stuff.
// It reminds me of when I was learning it too.
// These are just suggestions feel free to ignore them. :)

// Consider changing the table name to pages
// Columns to title, and body
// This might make it more clear later on.

// Consider moving this to a separate php file and turning them into a helper file.
// This way you can separate the HTML from the database logic.

// Put the name of the page into a variable
// if nothing there it will put it default it to Index.php
$pageName = $_GET['page'] ?? 'Index.php';


// Connect to MySQL database
$pdo = pdo_connect_mysql();

/**
 * This function get a list of all the items in the testtable01 and
 * puts the into into an array index by the testmenu1 row
 *
 * Consider putting a unique constraint on testmenu1
 *
 * @param PDO $pdo
 * @return array
 */
function getPagesInfo($pdo) {
    $stmt = $pdo->query("SELECT * FROM testtable01");
    $pages = [];
    while ($row = $stmt->fetch()) {
        $pages[$row['testmenu1']] = $row;
    }
    return $pages;
}

/**
 * This function will loop through all the pages to find the one with the page name
 *
 * @param $pages
 * @param $pageName
 * @return string
 */
function getPageInfo($pages, $pageName) {
     if (!empty($pages[$pageName])) {
         return $pages[$pageName]['testsubmenu1'];
     }

     return 'Page Not Found';
}

$pages = getPagesInfo($pdo);


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
               <!-- Consider moving this into it's own php file so that it's easier to change and re use. -->
                <?php
                foreach ($pages as $page) {
                    echo "<td class='navItem'>" . "<a href='index.php?page={$page['testmenu1']}'>" . $page['testmenu1']. "</a>" . "</td>";
                }
                ?>
                   
           </tr>
       </table>
       
       <!-- body text -->
       
       <h2>
           <?php  echo getPageInfo($pages, $pageName); ?>
       </h2>

     
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