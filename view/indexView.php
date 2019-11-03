
    <?php $title = 'SMASH NATION' ?>
    <?php ob_start(); ?>
    

        <p>Bienvenue à toi voici les dernières actus</p>

        
        <?php
        while ($donnees = $posts->fetch())
        {
        ?>
        <div class="news">
            <h3>
            <em>Catégorie <?php echo htmlspecialchars($donnees['name']); ?></em>
                <?php echo htmlspecialchars($donnees['title']); ?>
                <em>par <?php echo htmlspecialchars($donnees['author']); ?></em>
            </h3>
            
            <p>
            <?php
            echo nl2br(htmlspecialchars($donnees['content']));
            ?>
            <br />
            <em><a href="index.php?action=showPost&amp;id=<?= $donnees['id'] ?>">Voir plus</a></em>
            </p>
            <img src="<?php echo htmlspecialchars($donnees['imagePath'])?>" alt="test image">
        </div>
        <?php
        }
        $posts->closeCursor();
        $content = ob_get_clean();
        ?>

        <?php require('templateView.php') ?>