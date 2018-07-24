<?php
    include './db_conn.php';
    include './functions.php';
    session_start();

    $title = $db->escape_string($_POST['title']);
    $content = $db->escape_string($_POST['contents']);
    $current_date = date('Y-m-d');
    $user_id =  $_SESSION['id'];

    $sql = "INSERT INTO posts (`user_id`, `title`, `contents`, `date_added`) VALUES($user_id, '$title', '$content', '$current_date')";

    $succ = $db->query($sql);

    if(!$succ) flash('Nie udało się dodać posta', 'danger', '../public_html_html/profile.php');

    flash('Post został dodany', 'success', '../public_html_html/profile.php');