<?php $title = 'Espace de gestion' ?>
    <?php ob_start(); ?>

<h1>Modifiez votre contenu !</h1>

<form method="POST" action="index.php?action=updatePost&amp;id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
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

        <?php $content = ob_get_clean(); ?>

        <?php require('templateView.php') ?>