<?php
    include 'template_top.php';
    
    $user_id = $db->escape_string($_GET['id']);

    $sql = "SELECT username, private FROM users WHERE id = $user_id";
    $result = $db->query($sql);
    $result_fetched = $result->fetch_assoc();

    if($result_fetched['private']) {
        display_message('To konto jest prywatne', 'danger');
    } else {
?>


  <h1 class='mb-5'>Posty użytkownika <?= $result_fetched['username'] ?>: </h1>
  <?php 
    render_posts($db, $user_id); 
  ?>

<?php } include 'template_bottom.php'; ?>