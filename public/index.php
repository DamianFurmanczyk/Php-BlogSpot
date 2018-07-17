<?php include 'template_top.php'; ?>

  <h1 class='mb-4'>Ostatnie posty: </h1>
  <?php 
  render_posts($db); 
  ?>

<?php include 'template_bottom.php'; ?>