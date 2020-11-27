            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item active">Paiements</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des paiements
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Numéro du paiement</th>
                      <th>Client</th>
                      <th>Numéro de commande</th>
                      <th>Montant</th>
                      <th>Date</th>
                      <th>Mode de paiement</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($paiements as $paiement) { ?>
                    <tr>
                      <td><?= $paiement['pay_id'] ?></td>
                      <td><?= $paiement['cus_mail'] ?></td>
                      <td><?= $paiement['st_orders_ord_id'] ?></td>
                      <td><?= $paiement['pay_amount'] ?> &euro;</td>
                      <td><?= $paiement['pay_date'] ?></td>
                      <td><?= $paiement['typ_pay_descr'] ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Numéro du paiement</th>
                      <th>Client</th>
                      <th>Numéro de commande</th>
                      <th>Montant</th>
                      <th>Date</th>
                      <th>Mode de paiement</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>