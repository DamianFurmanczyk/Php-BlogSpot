<?php
  include('../includes/db_conn.php');
  session_start();
  include('../includes/functions.php');
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
        <?php include('../includes/modal.php') ?>
        <?php include('../includes/nav.php') ?>

        <div class="container mt-5">

        <?php if (isset($_SESSION['message'])) {
          print('
          <div id="notification" class="text-center mb-3 col-sm-12 col-md-6 offset-md-3 alert alert-'.$_SESSION['message_type'].'" role="alert">
            <strong>' . $_SESSION['message'] . '</strong>
          </div>');
        }
        
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);