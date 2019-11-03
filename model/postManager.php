<?php

include_once('dbManager.php');

function getPosts() {
    $db = dbConnect();
    $posts = $db->query('SELECT posts.id AS id, title, content, posts.author, name, imagePath
                        FROM posts
                        INNER JOIN categories 
                        ON categories.id = posts.idCategory
                        INNER JOIN users
                        ON users.id = posts.idUser;');

    return $posts;
}

function getPost($idPost) {
    $db = dbConnect();
    $req = $db->prepare('SELECT posts.id, title, content, posts.author, name, imagePath
                        FROM posts
                        INNER JOIN categories 
                        ON categories.id = posts.idCategory
                        INNER JOIN users
                        ON users.id = posts.idUser
                        WHERE posts.id = ?');
    $req->execute(array($idPost));
    $post = $req->fetch();

    return $post;

}

function newPost($title, $author, $content, $imagePath, $idUser, $idCategory) {
    $db = dbConnect();
    $post = $db->prepare('INSERT INTO posts(title, author, content, imagePath, idUser, idCategory) VALUES(?, ?, ?, ?, ?, ?)');
    $newPost = $post->execute(array($title, $author, $content, $imagePath, $idUser, $idCategory));
    return $newPost;
}

function editPost($idPost, $title, $content, $imagePath, $idCategory) {
    $db = dbConnect();
    $req = $db->prepare('UPDATE posts SET title = ?, content = ?, imagePath = ?, idCategory = ? WHERE id = ?');
    $updatePost = $req->execute(array($idPost, $title, $content, $imagePath, $idCategory ));
    return $updatePost;
}

function getComments($idPost) {
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, content FROM comments WHERE idPost = ?');
    $comments->execute(array($idPost));
    return $comments;
}

function getCategories() {
        $db = dbConnect();
        $categories = $db->query('SELECT * FROM categories');
        return $categories;
}