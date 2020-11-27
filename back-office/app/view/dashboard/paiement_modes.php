            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item active">Modes de paiement</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des modes de paiement
              <a class="btn btn-outline-dark rounded-pill" href="index?module=dashboard&action=paiement_modes_ajouter" role="button">Ajouter</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Mode de paiement</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($paiement_modes as $paiement_mode) { ?>
                    <tr>
                      <td><?= $paiement_mode['typ_pay_descr'] ?></td>
                      <td>
                        <a class="btn btn-outline-dark rounded-pill" href="index?module=dashboard&action=paiement_modes_modifier&id=<?= $paiement_mode['typ_pay_id'] ?>">Modifier</a>
                        <br>
                        <a class="btn btn-outline-dark rounded-pill mt-3" href="#" data-typ_pay_descr="<?= $paiement_mode['typ_pay_descr'] ?>" data-typ_pay_id="<?= $paiement_mode['typ_pay_id'] ?>" data-toggle="modal" data-target="#supprimer_paiement_mode">Supprimer</a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Mode de paiement</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="supprimer_paiement_mode" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Supprimer <span class="typ_pay_descr font-weight-bold"></span> ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Confirmez la suppression du mode de paiement</div>
              <div class="modal-footer">
                <form action="index?module=bdd&action=supprimer_paiement_mode" method="post">
                  <button class="btn btn-outline-dark rounded-pill" type="button" data-dismiss="modal">Annuler</button>
                  <button class="btn btn-outline-dark rounded-pill">Confirmer</button>
                  <input type="hidden" class="typ_pay_id" name="typ_pay_id" value="">
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>