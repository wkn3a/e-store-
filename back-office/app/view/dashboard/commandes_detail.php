            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item active">Commandes en détail</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des commandes en détail
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Client</th>
                      <th>Numéro de commande</th>
                      <th>Prix</th>
                      <th>Produit</th>
                      <th>Quantité du produit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($commandes as $commande) { ?>
                    <tr>
                      <td><?= $commande['cus_mail'] ?></td>
                      <td><?= $commande['st_orders_ord_id'] ?></td>
                      <td><?= $commande['ord_lines_price'] ?> &euro;</td>
                      <td><?= $commande['pro_title'] ?></td>
                      <td><?= $commande['ord_lines_qt'] ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Client</th>
                      <th>Numéro de commande</th>
                      <th>Prix</th>
                      <th>Produit</th>
                      <th>Quantité du produit</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>