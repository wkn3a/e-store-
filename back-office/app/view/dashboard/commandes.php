            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item active">Commandes</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des commandes
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Numéro de commande</th>
                      <th>Client</th>
                      <th>Date</th>
                      <th>Prix total</th>
                      <th>Quantité totale de produits</th>
                      <th>Adresse de livraison</th>
                      <th>Adresse de facturation</th>
                      <th>Mode de livraison</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($commandes as $commande) { ?>
                    <tr>
                      <td><?= $commande['ord_id'] ?></td>
                      <td><a class="text-dark" href="index.php?module=dashboard&action=commandes&cus_id=<?= $commande['cus_id'] ?>"><u><?= $commande['cus_mail'] ?></u></a></td>
                      <td><?= $commande['ord_date'] ?></td>
                      <td><?= $commande['ord_total'] ?> &euro;</td>
                      <td><?= $commande['ord_qt'] ?></td>
                      <td><?= $commande['delivery_address1'] ?><br><?= $commande['delivery_address2'] ?><br><?= $commande['delivery_zipcode'] ?><br><?= $commande['delivery_city'] ?></td>
                      <td><?= $commande['billing_address1'] ?><br><?= $commande['billing_address2'] ?><br><?= $commande['billing_zipcode'] ?><br><?= $commande['billing_city'] ?></td>
                      <td><?= $commande['typ_log_descr'] ?></td>
                      <td><a class="btn btn-outline-dark rounded-pill" href="index.php?module=dashboard&action=commande_detail&ord_id=<?= $commande['ord_id'] ?>">Détail</a><a class="btn btn-outline-dark rounded-pill mt-3" href="#" data-ord_id="<?= $commande['ord_id'] ?>" data-toggle="modal" data-target="#supprimer_commande">Supprimer</a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Numéro de commande</th>
                      <th>Client</th>
                      <th>Date</th>
                      <th>Prix total</th>
                      <th>Quantité totale de produits</th>
                      <th>Adresse de livraison</th>
                      <th>Adresse de facturation</th>
                      <th>Mode de livraison</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="supprimer_commande" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Supprimer la commande numéro <span class="ord_id_display font-weight-bold"></span> ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Confirmez la suppression de la commande</div>
              <div class="modal-footer">
                <form action="index.php?module=bdd&action=supprimer_commande" method="post">
                  <button class="btn btn-outline-dark rounded-pill" type="button" data-dismiss="modal">Annuler</button>
                  <button class="btn btn-outline-dark rounded-pill">Confirmer</button>
                  <input type="hidden" class="ord_id" name="ord_id" value="">
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>