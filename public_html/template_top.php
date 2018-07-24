<?php
  include_once('../includes/db_conn.php');
  session_start();
  include_once('../includes/functions.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Blogspot</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="stylesheets/index.css">
  </head>
  <body>
    <main>
        <?php include('../includes/nav.php') ?>

        <div class="container mt-5">

        <?php if (isset($_SESSION['message'])) {
          display_message($_SESSION['message'], $_SESSION['message_type']);
        }
        
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);