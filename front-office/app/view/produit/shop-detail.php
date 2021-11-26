    <?php include ("../app/view/layout/header.inc.php"); ?>
    <div class="shop-detail-3 woocommerce" id="page">
      <?php include ("../app/view/layout/header2.inc.php"); ?>
      <section class="sub-header shop-detail-1">
        <img class="rellax bg-overlay" src="https://images.unsplash.com/photo-1501946623428-b301146b83af?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="bike">
        <div class="overlay-call-to-action"></div>
        <h3 class="heading-style-3">Fiche produit</h3>
      </section>
      <section class="boxed-sm">
        <div class="container">
          <div class="row product-detail">
            <div class="row product-detail-wrapper">
              <div class="col-md-6">
                <div class="woocommerce-product-gallery vertical">
                  <div class="main-carousel">
                    <div class="item">
                      <img class="img-responsive" src="<?= $produit["pro_img_url"] ?>" alt="product thumbnail">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="summary">
                  <div class="desc">
                    <div class="header-desc">
                      <h2 class="product-title"><?= $produit["pro_title"] ?></h2>
                      <p class="price"><?= $produit["pro_price"] ?>  &euro;</p>
                    </div>
                    <div class="body-desc">
                      <div class="woocommerce-product-details-short-description">
                        <p><?= $produit["pro_descr"] ?></p>
                      </div>
                    </div>
                    <?php 
                      if (isset($_SESSION['user'])) { ?>
                    <div class="footer-desc">
                      
                      <form name="qt" class="cart" method="post" action="index.php?module=produit&action=shop-detail">
                        <div class="quantity buttons-added">
                          <input class="minus" value="-" type="button" id="moins">
                          <input class="input-text qty text" step="1" min="1" name="cad_qt" value="<?= ($qt >= 1 )? $qt['cad_qt']: '0'; ?>" id="count" title="Qty" type="number">
                          <input class="plus" value="+" type="button" id="plus">
                          <?php if(isset($_SESSION['user']['cus_id'])){ ?> 
                          <input type="hidden" name="cus_id" value="<?= $_SESSION['user']['cus_id']?>">
                          <input type="hidden" name="pro_id" value="<?= $produit["pro_id"] ?>">
                          <?php } ?>
                        </div>
                        <div class="group-btn-control-wrapper">
                          <button class="btn btn-brand pill text-uppercase">Ajouter ou Modifier le panier</button>
                        </div>
                      </form>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="product-meta">
                    <p class="posted-in">Catégories :
                      <?php foreach ($categories_produit as $categorie_produit) { ?>
                      <a href="index.php?module=produit&action=index&id=<?= $categorie_produit["cat_id"] ?>" rel="tag"><?= $categorie_produit["cat_descr"] ?></a>&nbsp;
                      <?php } ?>
                    </p>
                  </div>
                  <?php 
                    if (!isset($_SESSION["user"])) { ?>
                    <div>
                      <p class="message">Oups, il vous faut un compte pour pouvoir acheter en ligne !</p>
                      <a class="btn btn-info pill" href="index.php?module=utilisateur&action=register" role="button">S'inscrire maintenant</a>
                      <a class="btn btn-brand pill" href="index.php?module=utilisateur&action=login" role="button">Se connecter et commencer ses courses</a>
                    </div>
                  <?php  } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <script src="js/boutonqt.js"></script>
    <?php include ("../app/view/layout/footer.inc.php"); ?>