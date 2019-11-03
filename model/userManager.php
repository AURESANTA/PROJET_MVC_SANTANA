<?php

include_once('dbManager.php');

function addUser($username, $password) {

    $db = dbConnect();
    $req = $db->prepare('INSERT INTO users(username, password) VALUES (?, ?)');
    $newUser =  $req->execute(array($username, $password));
                
        return $newUser;
}


function logUser($username) {

    $db = dbConnect();
    $req = $db->prepare('SELECT id, password FROM users WHERE username = ?');
    $req->execute(array($username));
    $resultat = $req->fetch();

return $resultat;
}

function userPosts($user) {
    $db = dbConnect();
    $postsDatas = $db->prepare('SELECT * FROM posts WHERE idUser = ?');
    $postsDatas->execute(array($user));

    return $postsDatas;
}


function deleteUserPost($userPost) {
    $db = dbConnect();

        $deleteComments = $db->prepare('DELETE FROM comments WHERE idPost = ?');
        $deleteComments->execute(array($userPost));
    
        $deletePost = $db->prepare('DELETE FROM posts WHERE id = ?');
        $deletePost->execute(array($userPost));
        
        return $deleteComments;
        return $deletePost;
}       

?>