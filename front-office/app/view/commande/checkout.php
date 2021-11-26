    <?php include ("../app/view/layout/header.inc.php"); ?>
    <div class="checkout" id="page">
      <?php include ("../app/view/layout/header2.inc.php"); ?>
      <section class="sub-header shop-detail-1">
        <img class="rellax bg-overlay" src="https://images.unsplash.com/photo-1501946623428-b301146b83af?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="caddie">
        <div class="overlay-call-to-action"></div>
        <h3 class="heading-style-3">Commande</h3>
      </section>
      <section class="boxed-sm">
        <div class="container">
          <div class="woocommerce">
              <div class="row livraison_add">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title add_panel">Sesissez votre adresse</h4>
                  </div>
                  <form method="post" action="index.php?module=commande&action=modif_add">
                    <div class="panel-body">
                      <address>
                        <strong><?= $account["cus_lastname"] ?> <?= $account["cus_firstname"] ?></strong><br>
                        <div class="form-group organic-form-2">
                          <label>Adresse</label>
                          <input class="form-control" type="text" name="add_address1" required>
                        </div>
                        <div class="form-group organic-form-2">
                          <label>Complément d'adresse</label>
                          <input class="form-control" type="text" name="add_address2">
                        </div>
                        <div class="form-group organic-form-2">
                        <div class="row">
                          <div class="col-sm-4">
                            <label>Code postal</label>
                            <input class="form-control-code" type="text" name="add_zipcode" required>
                          </div>
                          <div class="col-sm-8">
                            <label>Ville</label>
                            <input class="form-control-ville" type="text" name="add_city" required>
                          </div>
                        </div>
                        <strong>Email : </strong><?= $account["cus_mail"] ?><br>
                      </address>
                      <input type="hidden" name="cus_id" value="<?= $account["cus_id"] ?>">
                      <button class="btn btn-info pill" type="submit" formaction="index.php?module=commande&action=add_adresse">Ajouter une nouvelle adresse</button>
                    </div>
                  </form>
                </div>
              </div>
              <form  class="woocommerce-checkout" method="post" action="index.php?module=commande&action=checkoutBis">
                <div class="row">
                  <div class="col-md-12">
                    <div>
                     <h4 class="mode adtitle">Adresse Livraison</h4> 
                    </div>
                    <h4 class="choix">Choisissez</h4>
                    <?php foreach ($accounts as $account_add){ ?> 
                      
                    
                    <div class="radio choix">

                      <label><!--value=add_id dans st_adress identifié avec st_customer_id----->
                        <input class="input-radio" name="st_address_delivery" 
                        value="<?= $account_add['add_id'] ?>" checked="checked" type="radio">Nom: <?= $account_add["cus_lastname"] ?> <?= $account_add["cus_firstname"] ?> <br>
                        <?= $account_add["add_address1"] ?><br>
                        <?= $account_add["add_address2"] ?><br>
                        <?= $account_add["add_zipcode"] ?> <?= $account_add["add_city"] ?>
                      </label>
                    </div>

                  <?php } ?>
                 </div> 
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div>
                      <h4 class="mode adtitle">Adresse Facturation</h4>
                    </div>
                    <h4 class="choix">Choisissez</h4>
                    <?php foreach ($accounts as $account_add){ ?> 
                      
                    
                    <div class="radio choix">

                      <label><!--value=add_id dans st_adress identifié avec st_customer_id----->
                        <input class="input-radio" name="st_address_billing" 
                        value="<?= $account_add['add_id'] ?>" checked="checked" type="radio">Nom: <?= $account_add["cus_lastname"] ?> <?= $account_add["cus_firstname"] ?> <br>
                        <?= $account_add["add_address1"] ?><br>
                        <?= $account_add["add_address2"] ?><br>
                        <?= $account_add["add_zipcode"] ?> <?= $account_add["add_city"] ?>
                      </label>
                    </div>

                  <?php } ?>
                 </div> 
                </div>
                <h4 class="mode adtitle">Mode de livraison</h4>
                <div class="woocommerce-checkout-payment">
                  <h4 class="choix">Choisissez type de Livraison</h4>
                  <?php foreach ($livraisons as $livraison) { ?>
                  <div class="payment_method_cheque">
                    <div class="radio choix">
                      <label>
                        <input class="input-radio" name="st_types_of_logistics_typ_log_id" value="<?= $livraison['typ_log_id'] ?>" <?php if ($livraison['typ_log_id'] == 1) echo "checked"; ?> type="radio"> <?= $livraison['typ_log_descr'] ?> <?= $livraison['typ_log_price'] ?> €
                      </label>
                    </div>
                  </div>
                  <?php } ?>
                  <input type="hidden" name="st_customers_cus_id" value="<?= $account['st_customers_cus_id'] ?>">    
                </div>
                <input class="form-control" type="hidden" value="<?= $account["cus_lastname"] ?>" name="cus_lastname">
                <input type="hidden" name="st_customers_cus_id" value="<?= $account["cus_id"] ?>">
                <input name="cus_firstname" type="hidden" value="<?= $account["cus_firstname"] ?>" class="form-control">
                <input class="form-control" type="hidden" value="<?= $account["cus_mail"] ?>" name="cus_mail">
                <input class="form-control" type="hidden" value="<?= $account["add_address1"] ?>" name="add_address1">
                
                
                <input class="form-control-ville" type="hidden" value="<?= $account["add_city"] ?>" name="add_city">
                <input class="form-control-code" type="hidden" value="<?= $account["add_zipcode"] ?>" name="add_zipcode">
              
            
                <div class="form-place-order">
                  <input class="place_order btn btn-brand pill" name="woocommerce_checkout_place_order" value="VALIDER ET PAYER" data-value="Place order" type="submit">
                </div>
              </form>
          </div>
        </div>
      </section>
    </div>
    <?php include ("../app/view/layout/footer.inc.php"); ?>