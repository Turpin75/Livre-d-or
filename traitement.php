<?php

require_once 'class/Comment.php';
require_once 'class/GuestBook.php';

$guestbook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'messages.txt');

if(isset($_POST['submit']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);

    $comment = New Comment($pseudo, $message);

    if($comment->isValid()):
        $guestbook->addComment($comment);
        $success = "Merci pour votre message";
        $pseudo = null;
        $message = null;
    else:
        $errors = $comment->getErrors();
    endif;
}

$comments = $guestbook->getComments();
