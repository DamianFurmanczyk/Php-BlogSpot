<?php
    require './db_conn.php';
    require './functions.php';
    session_start();

    $username = $db->escape_string($_POST['username']);

    // is username already taken?
    $username_taken_query = "SELECT * FROM users where USERNAME = '$username'";
    $result = $db->query($username_taken_query);

    if($result->num_rows > 0) flash('Podana nazwa jest zajęta', 'warning', '../public/profile.php');

    // if not proceed to update
    $i = 0;

    $query = "UPDATE `users` SET ";

    foreach($_POST as $upd_field => $upd_field_value) {
        if($upd_field_value) $i++;
    }

    foreach($_POST as $upd_field => $upd_field_value) {
        if($upd_field_value) {

            $upd_field_value = $db->escape_string($upd_field_value);

            if($upd_field == 'private') $upd_field_value = $upd_field_value == 'on' ? 1 : 0;
            if($upd_field == 'password') $upd_field_value = password_hash($upd_field_value, PASSWORD_BCRYPT);;
            
            $new_query_content = '`' . $upd_field . '` = "' . $upd_field_value . '"';
            $separator = $i > 1 ? ', ' : ' ';
            $query .= $new_query_content;
            $query .= $separator;
        }
        $i--;
    }
    
    $end_of_query = 'WHERE username = "' . $_SESSION['username'] .'";';
    $query .= $end_of_query;

    $db->query($query) or flash('Niepowodzenie wprowadzania zmian', 'danger', '../public/profile.php');
    
    session_destroy();
    session_start();
    flash('Ustawienia zostały zapisane, zaloguj się ponownie', 'success', '../public/login.php');