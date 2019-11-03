<?php
require('controller/mainController.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'showPosts') {

        showPosts();
    }
    elseif ($_GET['action'] == 'showPost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {

            showPost();
        }
        else {
            echo 'Erreur : Article introuvable';
        }
    }

    elseif($_GET['action'] == 'addPost') {
        if (!empty($_SESSION['username']) && !empty($_POST['content'])&& !empty($_POST['title'])){
            $imgUrl = getImgUrl(); 
            addPost($_POST['title'], $_SESSION['username'],  $_POST['content'],  $imgUrl, $_SESSION['id'], $_POST['category']); 
        }
        else {
            echo 'Erreur : tous les champs ne sont pas remplis !';
        }
    }

    elseif ($_GET['action'] == 'updatePost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $imgUrl = getImgUrl(); 
            updatePost($_GET['id'], $_POST['title'], $_POST['content'],  $imgUrl, $_POST['category']);
        }
    }

    elseif ($_GET['action'] == 'deletePost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {

            deletePost();
        }
    }

    elseif ($_GET['action'] == 'addComment') {
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
    }

    elseif ($_GET['action'] == 'deleteComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            deleteComment($_GET['id']);
        }
    }

    elseif ($_GET['action'] == 'showLogin') {
        showLogin();
    }

    elseif ($_GET['action'] == 'showUser') {
        showUserPosts($_SESSION['id']);
    }

    elseif ($_GET['action'] == 'showUpdate') {
        showUpdate($_SESSION['id'], $_GET['id']);
    }


    elseif ($_GET['action'] == 'disconnectUser') {
        disconnectUser();

    }
    elseif ($_GET['action'] == 'newUser') {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            newUser($_POST['username'], $_POST['password']);
        }
    }
    elseif ($_GET['action'] == 'verifyUser') {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                verifyUser($_POST['username'], $_POST['password']);
            }
    }
}



else {
    showPosts();
}