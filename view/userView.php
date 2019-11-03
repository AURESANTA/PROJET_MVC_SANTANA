<?php $title = $post['title'] ?>
    <?php ob_start(); ?>

        <p><a href="index.php">Retour à la page d'accueil</a></p>


        <h1>Bienvenue dans votre espace personnel, <?= $_SESSION['username'] ?> !</h1>
        <h2>Ecrire un nouveau post</h2>

        <form method="POST" action="index.php?action=addPost" enctype="multipart/form-data">
            <input type='text' id='title' name='title' placeholder='Titre'>
            <input type='text' id='content' name='content' placeholder='Contenu'>
            <select name="category" id="category">
            <?php
                foreach($categories as $category) {
            ?>
                <option value="<?php echo htmlspecialchars($category['id']); ?>"><?php echo htmlspecialchars($category['name']); ?></option> 
            <?php
            }
            ?>
            </select>
            <div>
                <label class="custom-file-label" for="imagePath">Selectionnez une image</label>
                <input type="file" class="custom-file-input" id="imagePath" name="imagePath">
            </div>
            <input type='submit'>
        </form>
        
            <strong>Voici la liste de vos publications sur le site</strong>

        <?php
            while($postData = $postsDatas->fetch()) {
        ?>
            <div class="news">
            <h3>
            <em>Catégorie <?php echo htmlspecialchars($postData['name']); ?></em>
                <?php echo htmlspecialchars($postData['title']); ?>
                <em>par <?php echo htmlspecialchars($postData['author']); ?></em>
            </h3>
            
            <p>
            <?php
            echo nl2br(htmlspecialchars($postData['content']));
            ?>
            <br />
            <em><a href="index.php?action=deletePost&amp;id=<?= $postData['id'] ?>">Supprimer</a></em>
            <em><a href="index.php?action=showUpdate&amp;id=<?= $postData['id'] ?>">Modifier</a></em>
            </p>
            <img src="<?php echo $postData['imagePath']?>" alt="test image">
        </div>


        <?php
            }
        $content = ob_get_clean();
        ?>
        
        

        <?php require('templateView.php') ?>