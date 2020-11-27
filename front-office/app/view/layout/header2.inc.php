      <nav id="menu">
        <ul>
          <li>
            <a href="index">Accueil</a>
          </li>
          <li>
            <a href="index?module=produit&action=index">Produits</a>
          </li>
          <li>
            <a href="index?module=commande&action=shop-cart">Panier</a>
          </li>
          <li>
            <a href="index?module=accueil&action=about">A propos</a>
          </li>
          <li>
            <a href="#">Compte</a>
            <ul>
              <?php if (!isset($_SESSION["user"])) { ?>
              <li>
                <a href="index?module=utilisateur&action=login">Se connecter</a>
              </li>
              <li>
                <a href="index?module=utilisateur&action=register">S'enregistrer</a>
              </li>
              <?php } else { ?>
              <li>
                <a href="index?module=utilisateur&action=account">Profil</a>
              </li>
              <li>
                <a href="index?module=utilisateur&action=logout">Se déconnecter</a>
              </li>
              <?php } ?>
            </ul>
          </li>
          <?php if (isset($_SESSION["user"]["cus_id"])) {
            if ($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4) { ?>
          <li>
            <a href="#">Admin</a>
            <ul>
              <li>
                <a href="../../back-office/webroot/index">Back-office</a>
              </li>
              <li>
                <a href="index?module=utilisateur&action=logout">Se déconnecter</a>
              </li>
            </ul>
          </li>
          <?php } } ?>
        </ul>
      </nav>
      <header class="header-style-1 static">
        <div class="container">
          <div class="row">
            <div class="header-1-inner">
              <a class="brand-logo animsition-link" href="index?module=accueil&action=index">
                <img style="height: 150px;" class="img-responsive" src="images/logo.jpg" alt="Logo WERP Store">
              </a>
              <nav>
                <ul class="menu hidden-xs">
                  <li>
                    <a href="index">Accueil</a>
                  </li>
                  <li>
                    <a href="index?module=produit&action=index">Produits</a>
                  </li>
                  <li>
                    <a href="index?module=accueil&action=about">A propos</a>
                  </li>
                  <li>
                    <a href="#">Compte</a>
                    <ul>
                      <?php if (!isset($_SESSION["user"])) { ?>
                      <li>
                        <a href="index?module=utilisateur&action=login">Se connecter</a>
                      </li>
                      <li>
                        <a href="index?module=utilisateur&action=register">S'enregistrer</a>
                      </li>
                      <?php } else { ?>
                      <li>
                        <a href="index?module=utilisateur&action=account">Profil</a>
                      </li>
                      <li>
                        <a href="index?module=utilisateur&action=logout">Se déconnecter</a>
                      </li>
                      <?php } ?>
                    </ul>
                  </li>
                  <?php if (isset($_SESSION["user"]["cus_id"])) {
                    if ($_SESSION["user"]["cus_id"] >= 1 && $_SESSION["user"]["cus_id"] <= 4) { ?>
                  <li>
                    <a href="#">Admin</a>
                    <ul>
                      <li>
                        <a href="../../back-office/webroot/index">Back-office</a>
                      </li>
                      <li>
                        <a href="index?module=utilisateur&action=logout">Se déconnecter</a>
                      </li>
                    </ul>
                  </li>
                  <?php } } ?>
                </ul>
              </nav>
              <aside class="right">
                <div class="widget widget-control-header widget-shop-cart js-widget-shop-cart">
                  <a class="control" href="index?module=commande&action=shop-cart">
                    <span class="lnr lnr-cart"></span>&nbsp;<span style="font-family: 'Roboto', sans-serif !important; font-size: 14px; font-weight: bold;">Panier</span>
                  </a>
                </div>
                <div class="widget widget-control-header hidden-lg hidden-md hidden-sm">
                  <a class="navbar-toggle js-offcanvas-has-events" href="#menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                </div>
              </aside>
            </div>
            <div class="text-center">
              <?php if (isset($_SESSION["user"])) { ?>
              Bienvenue <?= $_SESSION["user"]["cus_firstname"] ?>!
              <?php } else { ?>
              Bienvenue !
              <?php };?>
            </div>
          </div>
        </div>
      </header>