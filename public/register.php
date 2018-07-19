<?php include 'template_top.php'; ?>

  <div class="container">
      <form action="../includes/register.php" method="POST">
          <div class="form-group row">
              <div class="offset-md-2 offset-lg-3 col-sm-12 col-md-8 col-lg-6">
              <label for="username" class="col-sm-12 col-form-label">Nazwa użytkownika:</label>
                  <input type="text" class="form-control" name="username" id="username">
              </div>
              <div class="offset-md-2 offset-lg-3 col-sm-12 col-md-8 col-lg-6">
              <label for="password" class="col-sm-12 col-form-label">Hasło:</label>
                  <input type="password" class="form-control" name="password" id="password" >
              </div>
              <div class="offset-md-2 offset-lg-3 col-sm-12 col-md-8 col-lg-6">
              <label for="password-confirm" class="col-sm-12 col-form-label">Potwierdź hasło:</label>
                  <input type="password-confirm" class="form-control" name="password-confirm" id="password-confirm" >
              </div>
          </div>
          <div class="form-group row mt-4">
              <div class="offset-md-3 offset-lg-4 col-md-7 col-lg-5">
                <div class="row">
                    <div class="col-6">
                    <div class="custom-control custom-checkbox mr-2 mt-2">
                        <input type="checkbox" name="private" class="custom-control-input" id="private">
                        <label class="custom-control-label" for="private">Konto prywatne</label>
                    </div>
                    </div>
                  <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Rejestracja</button>
                  </div>
                </div>
              </div>
          </div>
      </form>
  </div>

<?php include 'template_bottom.php'; ?>