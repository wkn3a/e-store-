    <?php include ("../app/view/layout/header.inc.php"); ?>
    <div class="login" id="page">
      <?php include ("../app/view/layout/header2.inc.php"); ?>
      <?php
        if (isset($_GET['notif'])){
          if ($_GET['notif'] == 'regnok') { ?>
      <div class="alert alert-danger" role="alert">
        L'inscription a échoué, merci de réessayer :)
      </div>
      <?php } } ?>
      <section class="sub-header shop-layout-1">
        <img class="rellax bg-overlay" src="https://images.unsplash.com/photo-1501946623428-b301146b83af?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="bike">
        <div class="overlay-call-to-action"></div>
        <h3 class="heading-style-3">Mon compte</h3>
      </section>
      <section class="boxed-sm">
        <div class="container">
          <div class="login-wrapper">
            <div class="row">
              <h3>S'enregistrer</h3>
              <form method="post" action="index?module=utilisateur&action=register">
                <div class="form-group organic-form-2">
                  <label>Votre nom (*)</label>
                  <input name="cus_lastname" class="form-control" type="text" required>
                </div>
                <div class="form-group organic-form-2">
                  <label>Votre prénom (*)</label>
                  <input name="cus_firstname" class="form-control" type="text" required>
                </div>
                <div class="form-group organic-form-2">
                  <label>Votre e-mail (*)</label>
                  <input name="cus_mail" class="form-control" type="email" required>
                </div>
                <div class="form-group organic-form-2">
                  <label>Votre mot de passe (*)</label>
                  <input name="cus_password" class="form-control" type="password" required>
                </div>
                <div class="form-group organic-form-2">
                  <label>Adresse (*)</label>
                  <input name="add_address1" class="form-control" type="text" required>
                </div>
                <div class="form-group organic-form-2">
                  <label>Complément d'adresse</label>
                  <input name="add_address2" class="form-control" type="text">
                </div>
                <div class="form-group organic-form-2">
                  <label>Code postal (*)</label>
                  <input name="add_zipcode" class="form-control" type="text" required>
                </div>
                <div class="form-group organic-form-2">
                  <label>Ville (*)</label>
                  <input name="add_city" class="form-control" type="text" required>
                </div>
                <p>(*) Champ obligatoire</p>
                <div class="form-group footer-form">
                  <button class="btn btn-brand pill text-uppercase" type="submit">Envoyer</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include ("../app/view/layout/footer.inc.php"); ?>