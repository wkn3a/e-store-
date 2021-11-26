    <?php include ("../app/view/layout/header.inc.php"); ?>
    <div class="login" id="page">
      <?php include ("../app/view/layout/header2.inc.php"); ?>
      <?php if (isset($_GET['notif'])) {
        if ($_GET['notif'] == 'addressok') { ?>
      <div class="alert alert-success" role="alert">
        Adresse ajoutée à votre profil !
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
              <div>
                <h3>Mon profil</h3>
                <form method="post" action="index.php?module=utilisateur&action=account">
                  <div class="form-group organic-form-2">
                    <label>Nom</label>
                    <input class="form-control" type="text" value="<?= $account["cus_lastname"] ?>" name="cus_lastname">
                  </div>
                  <div class="form-group organic-form-2">
                    <label>Prénom</label>
                    <input class="form-control" type="text" value="<?= $account["cus_firstname"] ?>" name="cus_firstname">
                  </div>
                  <div class="form-group organic-form-2">
                    <label>E-mail</label>
                    <input class="form-control" type="email" value="<?= $account["cus_mail"] ?>" name="cus_mail">
                  </div>
                  <div class="form-group organic-form-2">
                    <p style="font-size: 15px;">Civilité</p> 
                    <input type="radio" id="civility_1" name="cus_civility" value="1" <?php if ($account["cus_civility"] == 1) echo "checked"; ?>>
                    <label for="civility_1">Homme</label><br>
                    <input type="radio" id="civility_2" name="cus_civility" value="2" <?php if ($account["cus_civility"] == 2) echo "checked"; ?>>
                    <label for="civility_2">Femme</label>
                  </div>
                  <div class="form-group organic-form-2">
                    <p style="font-size: 15px;">Abonné à la newsletter</p> 
                    <input type="radio" id="subscriber_1" name="cus_subscriber" value="1" <?php if ($account["cus_subscriber"] == 1) echo "checked"; ?>>
                    <label for="subscriber_1">Oui</label><br>
                    <input type="radio" id="subscriber_2" name="cus_subscriber" value="0" <?php if ($account["cus_subscriber"] == 0) echo "checked"; ?>>
                    <label for="subscriber_2">Non</label>
                  </div>
                  <input type="hidden" value="<?= $account["cus_id"] ?>" name="cus_id">
                  <div class="form-group footer-form">
                    <button class="btn btn-brand pill" type="submit">Modifier mon profil</button>
                  </div>
                  <div class="form-group footer-form">
                    <a class="js-quick-view del_account" href="#" data-id="<?= $account["cus_id"] ?>" data-toggle="modal" data-target="#confirm">Supprimer mon compte</a>
                  </div>
                </form>
              </div>
              <div>
                <h3>Mes adresses</h3>
                <?php foreach ($addresses as $address) { ?>
                <form>
                  <div class="form-group organic-form-2">
                    <label>Adresse</label>
                    <input class="form-control" type="text" value="<?= $address["add_address1"] ?>" name="add_address1">
                  </div>
                  <div class="form-group organic-form-2">
                    <label>Complément d'adresse</label>
                    <input class="form-control" type="text" value="<?= $address["add_address2"] ?>" name="add_address2">
                  </div>
                  <div class="form-group organic-form-2">
                    <div class="row">
                      <div class="col-sm-4">
                        <label>Code postal</label>
                        <input class="form-control-code" type="text" value="<?= $address["add_zipcode"] ?>" name="add_zipcode">
                      </div>
                      <div class="col-sm-8">
                        <label>Ville</label>
                        <input class="form-control-ville" type="text" value="<?= $address["add_city"] ?>" name="add_city">
                      </div>
                    </div>
                  </div>
                </form>
                <br><br>
                <?php } ?>
              </div>
              <div>
                <h3>Ajouter une adresse</h3>
                <form action="index.php?module=utilisateur&action=ajout_address" method="post">
                  <div class="form-group organic-form-2">
                    <label>Adresse (*)</label>
                    <input class="form-control" type="text" name="add_address1" required>
                  </div>
                  <div class="form-group organic-form-2">
                    <label>Complément d'adresse</label>
                    <input class="form-control" type="text" name="add_address2">
                  </div>
                  <div class="form-group organic-form-2">
                    <div class="row">
                      <div class="col-sm-4">
                        <label>Code postal (*)</label>
                        <input class="form-control-code" type="text" name="add_zipcode" required>
                      </div>
                      <div class="col-sm-8">
                        <label>Ville (*)</label>
                        <input class="form-control-ville" type="text" name="add_city" required>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" value="<?= $account["cus_id"] ?>" name="cus_id">
                  <p>(*) Champ obligatoire</p>
                  <div class="form-group footer-form">
                    <button type="submit" class="btn btn-brand pill">Ajouter une adresse</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="modal fade" id="confirm" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg modal-quickview woocommerce" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="woocommerce-product-gallery">
                  <div class="main-carousel-product-quick-view">
                    <div class="item">
                      <img class="img-responsive" src="https://st2.depositphotos.com/1781556/11646/i/950/depositphotos_116462056-stock-photo-delete-account-concept.jpg" alt="product thumbnail">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="summary">
                  <div class="desc">
                    <div class="header-desc">
                      <h2 class="product-title">Suppression de compte</h2>
                    </div>
                    <div class="body-desc">
                      <div class="woocommerce-product-details-short-description">
                        <p class="text-center">Voulez-vous vraiment nous quitter ?</p>
                      </div>
                    </div>
                    <div class="footer-desc">
                      <form class="cart" method="post" action="index.php?module=utilisateur&action=account_delete">
                        <div class="group-btn-control-wrapper">
                          <button class="btn btn-danger text-uppercase modal_button">Oui</button>
                          <a class="btn btn-success text-uppercase modal_button" href="index.php?module=utilisateur&action=account" role="button">Non</a>
                        </div>
                        <input class="id" type="hidden" name="cus_id" value="">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include ("../app/view/layout/footer.inc.php"); ?>