<?php include 'template_top.php';

    if(empty($_SESSION)) return flash('Musisz być zalogowanym aby przejść na tę stronę', 'danger');

?>

    <div class="container">
    <h1 class='mb-4'>Witaj, <?= $_SESSION['username'] ?>  </h1>

    <div class="offset-md-2 offset-lg-3 col-sm-12 col-md-8 col-lg-6">
      <h3 class="mb-3">Zmiana danych profilu:</h3>
    </div>
      <form action="../includes/user_update.php" method="POST">
          <div class="form-group row">
              <div class="offset-md-2 offset-lg-3 col-sm-12 col-md-8 col-lg-6">
              <label for="username" class="col-sm-12 col-form-label">Nazwa użytkownika:</label>
                  <input type="text" class="form-control" name="username" id="username">
              </div>
              <div class="offset-md-2 offset-lg-3 col-sm-12 col-md-8 col-lg-6">
              <label for="password" class="col-sm-12 col-form-label">Hasło:</label>
                  <input type="password" class="form-control" name="password" id="password" >
              </div>
          </div>
          <div class="form-group row mt-4">
              <div class="offset-md-3 offset-lg-4 col-md-7 col-lg-5">
                <div class="row">
                    <div class="col-6">
                    <div class="custom-control custom-checkbox mr-2 mt-2">
                        <input type="checkbox" 
                        <?php if($_SESSION["private"] === 1) {echo "checked"; }?>
                        name="private" class="custom-control-input" id="private">
                        <label class="custom-control-label" for="private">Konto prywatne</label>
                    </div>
                    </div>
                  <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Zmień</button>
                  </div>
                </div>
              </div>
          </div>
      </form>

      <hr class='my-5'>

      <h3 class="mb-4 posts">Twoje posty:
        <button id="add-post-btn" class="btn btn-success">+Nowy post</button>
      </h3>
      
      <form id="add-post-form" class="offset-md-7 col-md-5" action="../includes/add_post.php" method="POST">
            <div class="form-group mb-4">
                <label class="text-right" for="title">Tytuł</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label class="text-right" for="contents">Zawartość</label>
                <textarea class="form-control" id="contents" name="contents" rows="3"></textarea>
            </div>
            <button class="btn btn-success pull-right mt-2" type="submit">Dodaj</button>
        </form>
        <div class="clearfix mb-5"></div>

      <?php 
        render_posts($db, $_SESSION['id'], true); 
      ?>
  </div>

<?php include 'template_bottom.php'; ?>