<?php
    include './db_conn.php';
    include './functions.php';
    session_start();

    $post_id = $db->escape_string($_POST['postId']);
    $user_id = $_SESSION['id'];

    $sql ="DELETE FROM posts WHERE `user_id` = $user_id AND `id` = $post_id";
    $db->query($sql) or flash('Nie udało się usunąć posta.', 'danger');

    echo $sql;