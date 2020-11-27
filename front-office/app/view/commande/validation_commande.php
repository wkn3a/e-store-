    <?php include ("../app/view/layout/header.inc.php"); ?>
    <div class="checkout" id="page">
      <?php include ("../app/view/layout/header2.inc.php"); ?>
      <section class="sub-header shop-detail-1">
        <img class="rellax bg-overlay" src="https://images.unsplash.com/photo-1501946623428-b301146b83af?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="caddie">
        <div class="overlay-call-to-action"></div>
        <h3 class="heading-style-3">Votre commande a bien été validée</h3>
      </section>
      <section class="boxed-sm">
        <div class="container">
          <div class="row text-center">
            <img src="images/bag.png" alt="">
          </div>
          <div class="row message">
            <div class="col">
              <h2 class="text-center">Merci !</h2>
              <p class="text-center text-validation">A bientôt <?= $account["cus_firstname"] ?> !</p>
            </div>
          </div>
          <div class="row text-center">
            <div class="panel panel-success">
              
              <div class="panel-body">
                <address>
                  <div class="panel-title adresse_t">Adresse de livraison</div>
                  <strong><?= $account["cus_lastname"] ?> <?= $account["cus_firstname"] ?></strong><br>
                  <?= $commande["adres1d"] ?> <?= $commande["adres2d"] ?><br>
                  <?= $commande["delivary"] ?>, <?= $commande["zipcoded"] ?><br>
                </address> 
                <address>
                  <div class="panel-title adresse_t"><p>Adresse de facturation</p></div>
                  <strong><?= $account["cus_lastname"] ?> <?= $account["cus_firstname"] ?></strong><br>
                  <?= $commande["adres1b"] ?> <?= $commande["adres2b"] ?><br>
                  <?= $commande["delivary"] ?>, <?= $commande["zipcodeb"] ?><br>
                  
                </address>

                  <strong>Email : </strong><?= $account["cus_mail"] ?>
                  <div class="panel-title">
                  <strong>Montant total :</strong> <?= $_POST["pay_amount"] ?> €
                  </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include ("../app/view/layout/footer.inc.php"); ?>