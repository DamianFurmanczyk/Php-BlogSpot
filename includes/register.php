<?php
    require 'db_conn.php';
    require 'functions.php';
    session_start();

    $username = $db->escape_string($_POST["username"]);
    $password = $db->escape_string($_POST["password"]);
    $password_confirm = $db->escape_string($_POST["password-confirm"]);
    $private = isset($_POST['private']) ? 1 : 0;
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    if($password != $password_confirm) {
        
        flash("Podane hasła nie są jednakowe.", "warning", "../public_html/register.php");
    }

    if (empty($username) || empty($password) || empty($password_confirm)) {

        flash("Nie podano wszystkich wymaganych informacji.", "warning", "./public_html/register.php");
    } else {

        $sql = "SELECT * FROM `users` WHERE username = '$username'" ;
        $user_alredy_in_db_result = mysqli_query($db, $sql);
        
        if(mysqli_num_rows($user_alredy_in_db_result) > 0) {
            flash("Podana nazwa użytkownika jest zajęta.", "warning", "../public_html/register.php");
        } else {

            $sql = "INSERT INTO users (username, password, private)
            VALUES ('$username', '$hashed_password', '$private')";

            if(mysqli_query($db, $sql)) {

                $id_sql = "SELECT id FROM users WHERE `username` = '$username'";
                $result = $db->query($id_sql);
                $id = $result->fetch_assoc()['id'];

                login($id, $username, $password, $private);

                flash("Użytkownik został zarejestrowany.", "success", "../public_html/profile.php");
            } else {

                flash("Nie udało się zarejestrować użytkownika.", "danger", "../public_html/profile.php");
            }

        }
    }