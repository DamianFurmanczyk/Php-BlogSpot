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
              <div class="offset-md-4 offset-lg-5 col-md-6 col-lg-4">
                <div class="row">
                    <div class="col-7">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" name="privacy" class="custom-control-input" id="privacy">
                        <label class="custom-control-label" for="privacy">Konto prywatne</label>
                    </div>
                    </div>
                  <div class="col-5">
                    <button type="submit" class="btn btn-primary btn-block">Rejestracja</button>
                  </div>
                </div>
              </div>
          </div>
      </form>
  </div>

<?php include 'template_bottom.php'; ?>