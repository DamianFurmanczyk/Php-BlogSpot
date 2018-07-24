<?php
    require 'db_conn.php';
    require 'functions.php';
    session_start();

    $username = $db->escape_string($_POST["username"]);
    $password = $db->escape_string($_POST["password"]);

    if (empty($username) || empty($password)) {
        flash('Proszę wypełnić wszystkie pola', 'warning', '../public_html/login.php');
    }

    $sql = "SELECT * FROM `users` WHERE username = '$username'";
    $res = $db->query($sql);

    if(!$row = $res->fetch_assoc()) {

        flash('Użytkownik o podanej nazwie nie istnieje.', 'warning', '../public_html/login.php');
    } else {

        $password_verified = password_verify($password, $row['password']);
        if($password_verified) {

            login($row['id'], $row['username'], $row['password'], $row['private'], $row['id']);
            flash('Zalogowano', 'success', '../public_html/profile.php');
        } else {
            
            flash('Złe hasło', 'warning', '../public_html/login.php');
        }
    }

