<?php

include_once('dbManager.php');

function getCommentInfos($idcom) {

    $db = dbConnect();

    $selectComment = $db->prepare('SELECT idPost FROM comments WHERE id = ?');
    $selectedComment = $selectComment->execute(array($idcom));
    return $selectedComment;
}

function postComment($idPost, $author, $content) {
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(idPost, author, content) VALUES(?, ?, ?)');
    $newComment = $comments->execute(array($idPost, $author, $content));

    return $newComment;
}

function deleteUserComment($idComment) {
    $db = dbConnect();

    $comment = $db->prepare('DELETE FROM comments WHERE id = ?');
    $deletedComment = $comment->execute(array($idComment));

    return $deletedComment;
}