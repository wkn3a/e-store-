    <?php include ("../app/view/layout/header.inc.php"); ?>
    <div class="checkout" id="page">
      <?php include ("../app/view/layout/header2.inc.php"); ?>
      <section class="sub-header shop-detail-1">
        <img class="rellax bg-overlay" src="https://images.unsplash.com/photo-1501946623428-b301146b83af?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
        <div class="overlay-call-to-action"></div>
        <h3 class="heading-style-3">Validation de commande</h3>
      </section>
      <section class="boxed-sm">
        <div class="container">
          <div class="woocommerce">
            <div class="row">
              <form class="woocommerce-checkout" method="post" action="index?module=commande&action=validation_commande">
                <div class="woocommerce-checkout-review-order">
                  <h4>Votre commande</h4>
                  <table class="woocommerce-checkout-review-order-table">
                    <thead>
                      <tr>
                        <th class="product-name">Produits</th>
                        <th class="product-total">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($paniers as $panier) { ?>
                      <tr class="cart_item">
                        <td class="product-name"><?= $panier["pro_title"] ?>
                          <span class="product-quantity">×<?= $panier["cad_qt"] ?></span>
                        </td>
                        <td class="product-total">
                          <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol"></span>
                            <?= sprintf('%.2f',$panier["total"]) ?> &euro;
                          </span>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tr class="product-quantity">
                      <th>Quantité</th>
                      <td>
                        <span class="woocommerce-Price-amount amount"><?= $qt['cad_qt_count'] ?></span>
                        <input type="hidden" name="cad_qt" value="<?= $qt['cad_qt_count'] ?>">
                      </td>
                    </tr>
                    <tfoot>
                      <tr class="cart-subtotal">
                        <th>Sous-total</th>
                        <td>
                          <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol"></span>
                            <?= sprintf('%.2f',$sum) ?> &euro;
                          </span>
                        </td>
                      </tr>
                      <tr class="cart-shipping">
                        <th>Frais de livraison</th>
                        <td>
                          <span class="woocommerce-Price-amount amount" id="typ_log_price"><?= $prix_livraison["typ_log_price"] ?> &euro;</span>
                          <input type="hidden" name="typ_log_price" value="<?= $prix_livraison["typ_log_price"] ?>">
                        </td>
                      </tr>
                      <tr class="order-total">
                        <th>Total</th>
                        <td>
                          <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol" id="frais"></span>
                            <?= $sum_final ?> &euro;
                            <input type="hidden" name="pay_amount" value="<?= $sum_final ?>">
                          </span>
                            <input type="hidden" name="pay_amount" value="<?= $sum_final ?>">
                            <input type="hidden" name="ord_total" value="<?= $sum_final ?>">
                          <input type="hidden" name="cus_id" value="<?= $_SESSION["user"]["cus_id"] ?>">
                          <input type="hidden" name="ord_qt" value="<?= $qt['cad_qt_count'] ?>">
                          <input type="hidden" name="ord_id" value="<?= $order[0]['ord_id'] ?>">
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <h4>Mode de paiement</h4>
                <div class="woocommerce-checkout-payment">
                  <?php foreach ($paiements as $paiement) { ?>
                  <div class="payment_method_cheque">
                    <div class="radio">
                      <label>
                        <input class="input-radio"  name="typ_pay_id" value="<?= $paiement["typ_pay_id"]?>" <?php if ($paiement["typ_pay_id"] == 1) echo "checked"; ?> type="radio"><?= $paiement["typ_pay_descr"] ?>
                      </label>
                    </div>
                  </div>
                  <?php } ?>
                  <div class="form-place-order">
                    <input class="place_order btn btn-brand pill" name="woocommerce_checkout_place_order" value="VALIDER LA COMMANDE" data-value="Place order" type="submit">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include ("../app/view/layout/footer.inc.php"); ?>