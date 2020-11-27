    <?php include ("../app/view/layout/header.inc.php"); ?>
    <div class="shop-cart" id="page">
      <?php include ("../app/view/layout/header2.inc.php");?>
      <section class="sub-header shop-detail-1">
        <img class="rellax bg-overlay" src="https://images.unsplash.com/photo-1501946623428-b301146b83af?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="img">
        <div class="overlay-call-to-action"></div>
        <h3 class="heading-style-3">Panier</h3>
      </section>
      <section class="boxed-sm">
        <div class="container">
          <?php if($paniers) { ?>
          <div class="woocommerce">
            <form class="woocommerce-cart-form" method="post" action="index?module=commande&action=shop-cart">
              <table class="woocommerce-cart-table">
                <thead>
                  <tr>
                    <th class="product-thumbnail"></th>
                    <th class="product-name">Produit</th>
                    <th class="product-price">Prix</th>
                    <th class="product-quantity">Quantité</th>
                    <th class="product-subtotal">Total</th>
                    <th class="product-remove"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($paniers as $panier) { ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="<?= $panier["pro_img_url"] ?>" style="height:100px;" alt="product-thumbnail">
                    </td>
                    <td class="product-name" data-title="Product">
                      <a class="product-name" href="index?module=produit&action=shop-detail&id=<?= $panier["pro_id"] ?>"><?= $panier["pro_title"] ?></a>
                    </td>
                    <td class="product-price" data-title="Price"><?= $panier["pro_price"] ?></td>
                    <td class="product-quantity" data-title="Quantity">
                      <input type="hidden" name="cus_id[]" value="<?= $_SESSION["user"]["cus_id"]?>">
                      <input type="hidden" name="pro_id[]" value="<?= $panier["pro_id"] ?>">
                      <input class="qty" step="1" min="0" name="cad_qt[]" value="<?= $panier["cad_qt"] ?>" title="Qty" type="number">
                    </td>
                    <td class="product-subtotal" data-title="Total"><?= sprintf('%.2f',$panier['total']);?> €</td>
                    <td class="product-remove">
                      <a class="remove" href="index?module=commande&action=shop-cart&cus_id=<?= $_SESSION["user"]["cus_id"]?>&pro_id=<?= $panier["pro_id"] ?>" aria-label="Remove this item">x</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="6">
                      <div class="form-coupon organic-form">
                        <div class="form-group update-cart">
                          <button type="submit" class="btn btn-brand-ghost pill text-uppercase bouton-update">Mettre a jour le panier</button>
                        </div>
                        <div class="form-group update-cart">
                          <a href="index?module=commande&action=panier_suppr" class="confirm btn btn-danger pill text-uppercase bouton-update">Vider le panier</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </form>
            <div class="cart_totals">
              <h3 class="title">Sous-total</h3>
              <div class="row">
                <div class="col-md-12">
                  <table class="woocommerce-cart-subtotal">
                    <tbody>
                      <tr>
                        <th class="text-center">Quantité</th>
                        <th class="text-center">Total</th>
                      </tr>
                      <tr>
                        <td class="text-center"><?= $qt['cad_qt_count'] ?> produit<?php if ($qt['cad_qt_count'] > 1) echo "s"; ?></td>
                        <td class="text-center"><?= $prixtotal ?>  &euro;</td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="proceed-to-checkout">
                        <a href="index?module=produit&action=index" class="btn btn-brand pill commande text-uppercase">Continuez vos achats</a>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="proceed-to-checkout bouton-commander">
                        <a class="btn btn-brand pill text-uppercase commande" href="index?module=commande&action=checkout">Commander</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } else { ?>
          <div class="woocommerce text-center">
            <h3 class="heading-style-2">Votre panier est vide</h3>
            <p><a class="btn btn-brand pill" href="index?module=accueil&action=index" role="button">Continuez vos achats</a></p>
          </div>
          <?php } ?>
        </div>
      </section>
    </div>
    <?php include ("../app/view/layout/footer.inc.php"); ?>