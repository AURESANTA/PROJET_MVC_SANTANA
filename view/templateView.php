<?php 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="SRC/STYLES/styles.css" rel="stylesheet" />
    </head>
    <header>
        <div class='mainpage'>
            <nav class='navbar'>
                <ul class='navlist'>
                    <li>SMASH NATION</li>
                    <?php 
                    if(!empty($_SESSION['username'])) {
                        ?>
                    <li><a href="index.php?action=disconnectUser">Déconnexion</a></li>
                    <?php
                    }
                    ?>
                    <?php 
                    if(empty($_SESSION['username'])) {
                    ?>
                    <li><a href="index.php?action=showLogin">Login</a></li>
                    <?php
                    }
                    ?>
                    <li><a href="index.php?action=showUser"><?php
                    
                        echo ($_SESSION['username']);
                    
                    ?></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <body>
        <?= $content ?>
    </body>
</html>