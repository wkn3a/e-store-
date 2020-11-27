<!DOCTYPE html>
<html lang="<?= APP_LANG ?>">
  <head>
    <meta charset="<?= APP_CHARSET ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= PAGE_TITLE ?></title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Connection</div>
        <div class="card-body">
          <form action="index?module=admin&action=login" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="mail" class="form-control" name="cus_mail" required autofocus="autofocus">
                <label for="mail">E-mail</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="password" class="form-control" name="cus_password" required>
                <label for="password">Mot de passe</label>
              </div>
            </div>
            <input type="submit" value="Se connecter" class="btn btn-block btn-outline-dark rounded-pill">
          </form>
        </div>
      </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  </body>
</html>