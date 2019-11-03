
<?php $title = 'SMASH NATION | Login' ?>
    <?php ob_start(); ?>

        <p><a href="index.php">Retour à la liste des billets</a></p>

        <h1>Connexion à SMASH NATION</h1>

        <form method="POST" action="index.php?action=verifyUser">
            <input type='text' id='username' name='username' placeholder='Entrez un pseudo'>
            <input type='password' id='password' name='password' placeholder='Entrez un mot de passe'>
            <input type='submit'>
        </form>

        <h2>Pas encore inscrit ?

        <form method="POST" action="index.php?action=newUser">
            <input type='text' id='username' name='username' placeholder='Entrez un pseudo'>
            <input type='password' id='password' name='password' placeholder='Entrez un mot de passe'>

            <input type='submit'>
        </form>

        <?php
        
        $content = ob_get_clean();
        
        ?>

        <?php require('templateView.php') ?>