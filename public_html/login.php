<?php include 'template_top.php'; ?>

  <div class="container">
      <form action="../includes/login.php" method="POST">
          <div class="form-group row">
              <div class="offset-md-3 col-sm-12 col-md-6">
              <label for="username" class="col-sm-12 col-form-label">Nazwa użytkownika:</label>
                  <input type="text" class="form-control" name="username" id="username">
              </div>
              <div class="offset-md-3 col-sm-12 col-md-6">
              <label for="inputName" class="col-sm-12 col-form-label">Hasło:</label>
                  <input type="password" class="form-control" name="password" id="password" >
              </div>
          </div>
          <div class="form-group row mt-4">
              <div class="offset-md-7 col-md-2">
                  <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
              </div>
          </div>
      </form>
  </div>

<?php include 'template_bottom.php'; ?>