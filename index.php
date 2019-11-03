<?php
require('controller/mainController.php');

if (isset($_GET['action'])) {
    $action = $_REQUEST['action'];
}
else {
    $action = 'showPosts';
}

        switch($action) { 
            case 'showPosts': 
                showPosts();
            break;

            case 'showPost':
            if (isset($_GET['id']) && $_GET['id'] > 0) {

                showPost();
            }
            else {
                echo 'Erreur : Article introuvable';
            }
            break;

            case 'addPost':
            if (!empty($_SESSION['username']) && !empty($_POST['content'])&& !empty($_POST['title'])){
                $imgUrl = getImgUrl(); 
                addPost($_POST['title'], $_SESSION['username'],  $_POST['content'],  $imgUrl, $_SESSION['id'], $_POST['category']); 
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
            break;

            case 'updatePost':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $imgUrl = getImgUrl(); 
                updatePost($_POST['title'], $_POST['content'],  $imgUrl, $_POST['category'], $_GET['id'], );
            }
            break;

            case 'deletePost':
            if (isset($_GET['id']) && $_GET['id'] > 0) {

                deletePost();
            }
            break;

            case 'addComment':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['content'])) {
                    addComment($_GET['id'], $_SESSION['username'], $_POST['content']);
                }
                else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;

            case 'deleteComment':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteComment($_GET['id']);
            }
            break;

            case 'showLogin':
            showLogin();
            break;

            case 'showUser':
            showUserPosts($_SESSION['id']);
            break;

            case 'showUpdate':
            showUpdate($_SESSION['id'], $_GET['id']);
            break;

            case 'disconnectUser':
            disconnectUser();
            break;

            case 'newUser':
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                newUser($_POST['username'], $_POST['password']);
            }
            break;

            case 'verifyUser':
                if (!empty($_POST['username']) && !empty($_POST['password'])) {
                    verifyUser($_POST['username'], $_POST['password']);
                }
                break;

            default:

            showPosts();
}


