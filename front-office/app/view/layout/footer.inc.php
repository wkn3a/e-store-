    <footer class="footer-style-1">
      <div class="container">
        <div class="row">
          <div class="footer-style-1-inner">
            <div class="widget-footer widget-text col-first col-small">
              <a href="#">
                <img style="height: 180px;" class="logo-footer" src="images/logo.jpg" alt="Logo WERP Store">
              </a>
              <div class="widget-link">
                <ul>
                  <li>
                    <span class="lnr lnr-map-marker icon"></span>
                    <span><?= STORE_ADDRESS ?></span>
                  </li>
                  <li>
                    <span class="lnr lnr-phone-handset icon"></span>
                    <a href="tel:<?= SITE_PHONE ?>"><?= SITE_PHONE ?></a>
                  </li>
                  <li>
                    <span class="lnr lnr-envelope icon"></span>
                    <a href="mailto:<?= SITE_MAIL ?>"><?= SITE_MAIL ?></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="widget-footer widget-link col-second col-medium">
              <div class="list-link">
                <h4 class="h4 heading">Boutique</h4>
                <?php foreach ($categories as $categorie) { ?>
                <ul>
                  <li>
                    <a href="index.php?module=produit&action=index&id=<?= $categorie["cat_id"] ?>"><?= $categorie["cat_descr"] ?></a>
                  </li>
                </ul>
              <?php } ?>
              </div>
              <div class="list-link">
                <h4 class="h4 heading">Informations</h4>
                <ul>
                  <li>
                    <a href="index.php?module=accueil&action=about">A propos de nous</a>
                  </li>
                </ul>
              </div>
              <div class="list-link">
                <h4 class="h4 heading">Compte</h4>
                <ul>
                  <?php if (!isset($_SESSION["user"])) { ?>
                  <li>
                    <a href="index.php?module=utilisateur&action=login">Se connecter</a>
                  </li>
                  <li>
                    <a href="index.php?module=utilisateur&action=register">S'enregistrer</a>
                  </li>
                  <?php } else { ?>
                  <li>
                    <a href="index.php?module=utilisateur&action=account">Profil</a>
                  </li>     
                  <?php if ($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4) { ?>
                  <li>
                    <a href="../../back-office/webroot/index">Back-office</a>
                  </li>
                  <?php } ?>
                  <li>
                    <a href="index.php?module=utilisateur&action=logout">Se déconnecter</a>
                  </li>
                  <?php } ?>          
                </ul>
              </div>
            </div>
            <?php if (isset($_SESSION["user"]["cus_subscriber"])) { ?>
            <div class="widget-footer widget-newsletter-footer col-last col-small">
              <h4 class="h4 heading">Newsletter</h4>
              <?php if ($_SESSION["user"]["cus_subscriber"] == 0) { ?>
              <form class="organic-form form-inline btn-add-on circle border" action="index.php?module=utilisateur&action=subscribe" method="post">
                <div class="form-group">
                  <p>Abonnez-vous pour bons plans quotidiens !</p>
                  <button class="btn btn-brand circle" type="submit">
                    <i class="fa fa-envelope-o"></i>
                  </button>
                </div>
              </form>
              <?php } else { ?>
              <form class="organic-form form-inline btn-add-on circle border" action="index.php?module=utilisateur&action=unsubscribe" method="post">
                <div class="form-group">
                  <p>Désabonnez-vous (bye bye spam mail).</p>
                  <button class="btn btn-brand circle" type="submit">
                    <i class="fa fa-envelope-o"></i>
                  </button>
                </div>
              </form>
              <?php } ?>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="copy-right style-1">
        <div class="container">
          <div class="row">
            <div class="copy-right-inner">
              <p><?= SITE_COPYRIGHT ?></p>
              <div class="widget widget-footer widget-footer-creadit-card">
                <ul class="list-unstyle">
                  <li>
                    <a href="#">
                      <img src="images/icons/creadit-card-01.png" alt="creadit card">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="images/icons/creadit-card-02.png" alt="creadit card">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="images/icons/creadit-card-03.png" alt="creadit card">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="images/icons/creadit-card-04.png" alt="creadit card">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="js/library/jquery.min.js"></script>
    <script src="js/library/bootstrap.min.js"></script>
    <script src="js/function-check-viewport.js"></script>
    <script src="js/library/slick.min.js"></script>
    <script src="js/library/select2.full.min.js"></script>
    <script src="js/library/imagesloaded.pkgd.min.js"></script>
    <script src="js/library/jquery.mmenu.all.min.js"></script>
    <script src="js/library/rellax.min.js"></script>
    <script src="js/library/isotope.pkgd.min.js"></script>
    <script src="js/library/bootstrap-notify.min.js"></script>
    <script src="js/library/bootstrap-slider.js"></script>
    <script src="js/library/in-view.min.js"></script>
    <script src="js/library/countUp.js"></script>
    <script src="js/library/animsition.min.js"></script>
    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="revolution/css/navigation.css">
    <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="js/global.js"></script>
    <script src="js/config-banner-home-1.js"></script>
    <script src="js/config-mm-menu.js"></script>
    <script src="js/config-set-bg-blog-thumb.js"></script>
    <script src="js/config-isotope-product-home-1.js"></script>
    <script src="js/config-carousel-thumbnail.js"></script>
    <script src="js/config-carousel-product-quickview.js"></script>
    <script src="js/demo-add-to-cart.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/werp_script.js"></script>
  </body>
</html>