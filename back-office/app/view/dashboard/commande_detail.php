            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item active">
              <a class="text-dark" href="index?module=dashboard&action=commandes">Commandes</a>
            </li>
            <li class="breadcrumb-item active">Détail d'une commande</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Détail de la commande numéro <strong><?= $_GET["ord_id"] ?></strong> de <strong><?= $commande_details[0]['cus_mail'] ?></strong>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Prix</th>
                      <th>Produit</th>
                      <th>Quantité</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($commande_details as $commande_detail) { ?>
                    <tr>
                      <td><?= $commande_detail['ord_lines_price'] ?> &euro;</td>
                      <td><?= $commande_detail['pro_title'] ?></td>
                      <td><?= $commande_detail['ord_lines_qt'] ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Prix</th>
                      <th>Produit</th>
                      <th>Quantité</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>