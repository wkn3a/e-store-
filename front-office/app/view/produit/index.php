    <?php include ("../app/view/layout/header.inc.php"); ?> 
    <div class="shop-layout-1" id="page">
      <?php include ("../app/view/layout/header2.inc.php"); ?>
      <?php if (isset($_GET['notif'])) {
        if ($_GET['notif'] == 'ok_ajout' || $_GET['notif'] == 'ok_modif' ) { ?>
      <div class="alert alert-success" role="alert">
        Le produit a bien été ajouté à votre panier.
      </div>
      <?php } } ?>
      <section class="sub-header shop-layout-1">
        <img class="rellax bg-overlay" src="https://images.unsplash.com/photo-1501946623428-b301146b83af?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="bike">
        <div class="overlay-call-to-action">
          <?php if (isset($_GET['notif'])) {
          if ($_GET['notif'] == 'ok_one_pro' || $_GET['notif'] == 'ok_one_pro_dup') { ?>
          <div class="alert alert-success" role="alert">
            Le produit a été ajouté dans votre panier !
          </div>
          <?php }
          if ($_GET['notif'] == 'nok_one_pro') { ?>
          <div class="alert alert-danger" role="alert">
            Dommage! Le produit n'a pas été ajouté dans votre panier !
          </div>
          <?php } } ?>
        </div>
        <h3 class="heading-style-3">Produits</h3>
      </section>
      <section class="box-sm">
        <br>
        <?php if (isset($_GET["id"])) { ?>
        <h2 class="text-center"><?= $produits[0]["cat_descr"] ?></h2>
        <?php } else { ?>
        <h2 class="text-center">Tous les produits</h2>
        <?php } ?>
        <div class="container">
          <div class="row main">
            <div class="row product-grid-equal-height-wrapper product-equal-height-4-columns flex multi-row">
              <?php foreach ($produits as $produit) { ?>
              <figure class="item">
                <div class="product product-style-1">
                  <div class="img-wrapper">
                    <a href="index?module=produit&action=shop-detail&id=<?= $produit["pro_id"]?>">
                      <img class="img-responsive" src="<?= $produit["pro_img_url"] ?>" alt="product thumbnail">
                    </a>
                    <div class="product-control-wrapper bottom-right">
                      <div class="wrapper-control-item">
                        <a class="js-quick-view" href="#" data-title="<?= $produit["pro_title"]?>" data-price="<?= $produit["pro_price"] ?> &euro;" data-img="<?= $produit["pro_img_url"] ?>" data-descr="<?= $produit["pro_descr"] ?>" data-proid="<?=$produit['pro_id'] ?>" data-toggle="modal" data-target="#quick-view-product">
                          <span class="lnr lnr-eye"></span>
                        </a>
                      </div>
                      <?php if (isset($_SESSION['user'])) { ?> 
                      <div class="wrapper-control-item item-add-cart">
                        <a class="animate-icon-cart" href="index?module=produit&action=index&cus_id=<?= $_SESSION['user']['cus_id'] ?>&pro_id=<?= $produit["pro_id"] ?>&page=<?= $page ?>">
                          <span class="lnr lnr-cart"></span>
                        </a>
                        <svg x="0px" y="0px" width="36px" height="32px" viewbox="0 0 36 32">
                          <path stroke-dasharray="19.79 19.79" fill="none" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                        </svg>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="desc text-center caption">
                    <h3>
                      <a class="product-name" href="index?module=produit&action=shop-detail&id=<?= $produit["pro_id"]?>"><?= $produit["pro_title"] ?></a>
                    </h3>
                    <span class="price"><?= $produit["pro_price"] ?> &euro;</span>
                  </div>
                </div>
              </figure>
              <?php } ?>
            </div>
            <div class="row">
              <div class="col-md-12 text-right">
                <nav>
                  <ul class="pagination pagination-style-1">
                    <?php if (isset($_GET["id"])) { ?>
                    <li>
                      <a class="prev page-numbers" href="index?module=produit&action=index&id=<?= $produit["cat_id"] ?>&page=<?= $page - 1 ?>">
                        <i class="fa fa-angle-left"></i>
                      </a>
                    </li>
                    <?php for ($i=1; $i <=$pages; $i++) {
                      if ($i !=$page) { ?>
                    <li>
                      <a class="page-numbers" href="index?module=produit&action=index&id=<?= $produit["cat_id"] ?>&page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php } else { ?>
                    <li>
                      <span class="page-numbers current"><?= $i ?></span>
                    </li>
                    <?php } } ?>
                    <li>
                      <a class="next page-numbers" href="index?module=produit&action=index&id=<?= $produit["cat_id"] ?>&page=<?= $page + 1 ?>">
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                    <?php } else { ?>
                    <li>
                      <a class="prev page-numbers" href="index?module=produit&action=index&page=<?= $page - 1 ?>">
                        <i class="fa fa-angle-left"></i>
                      </a>
                    </li>
                    <?php for ($i=1; $i <=$pages; $i++) {
                      if ($i !=$page) { ?>
                    <li>
                      <a class="page-numbers" href="index?module=produit&action=index&page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php } else { ?>
                    <li>
                      <span class="page-numbers current"><?= $i ?></span>
                    </li>
                    <?php } } ?>
                    <li>
                      <a class="next page-numbers" href="index?module=produit&action=index&page=<?= $page + 1 ?>">
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                    <?php } ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="modal fade" id="quick-view-product" tabindex="-1" role="dialog">
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
                      <img class="img-responsive" src="#" alt="product thumbnail">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="summary">
                  <div class="desc">
                    <div class="header-desc">
                      <h2 class="product-title title_pro">Produit</h2>
                      <p class="price"></p>
                    </div>
                    <div class="body-desc">
                      <div class="woocommerce-product-details-short-description">
                        <p class="pro_descr"></p>
                      </div>
                    </div>
                    <div class="footer-desc"><?php if (isset($_SESSION['user'])) { ?>
                      <form class="cart" name="qt" method="post" action="index?module=produit&action=shop-detail">
                        <div class="quantity buttons-added">
                          <input class="minus" value="-" type="button" id="moins" >
                          <input class="input-text qty text" id="count" step="1" min="1" name="cad_qt"  value="1" title="Qty" type="number" >
                          <input class="plus" value="+" id="plus" type="button" >
                          <input class="pro_id" type="hidden" name="pro_id" value="">
                          <input type="hidden" name="cus_id" value="<?= $_SESSION['user']['cus_id'] ?>">
                        </div>
                        <div class="group-btn-control-wrapper">
                          <button class="btn btn-brand pill text-uppercase">Ajouter ou Modifier le panier</button>
                        </div>
                        <?php } else { ?>
                        <div>
                          <p class="message">Oups, il vous faut un compte pour pouvoir acheter en ligne !</p>
                          <div>
                            <a class="btn btn-info margin_modal pill" href="index?module=utilisateur&action=register" role="button">S'inscrire maintenant</a>
                            <a class="btn btn-brand pill" href="index?module=utilisateur&action=login" role="button">Se connecter et commencer ses courses</a>
                          </div>
                        </div>
                        <?php } ?>
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
    <script src="js/boutonqt.js"></script>
    <?php include ("../app/view/layout/footer.inc.php"); ?>