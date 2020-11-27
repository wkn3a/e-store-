            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item active">Modes de livraison</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des modes de livraison
              <a class="btn btn-outline-dark rounded-pill" href="index?module=dashboard&action=livraison_modes_ajouter" role="button">Ajouter</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Mode de livraison</th>
                      <th>Prix</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($livraison_modes as $livraison_mode) { ?>
                    <tr>
                      <td><?= $livraison_mode['typ_log_descr'] ?></td>
                      <td><?= $livraison_mode['typ_log_price'] ?> &euro;</td>
                      <td>
                        <a class="btn btn-outline-dark rounded-pill" href="index?module=dashboard&action=livraison_modes_modifier&id=<?= $livraison_mode['typ_log_id'] ?>">Modifier</a>
                        <br>
                        <a class="btn btn-outline-dark rounded-pill mt-3" href="#" data-typ_log_descr="<?= $livraison_mode['typ_log_descr'] ?>" data-typ_log_id="<?= $livraison_mode['typ_log_id'] ?>" data-toggle="modal" data-target="#supprimer_livraison_mode">Supprimer</a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Mode de livraison</th>
                      <th>Prix</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="supprimer_livraison_mode" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Supprimer <span class="typ_log_descr font-weight-bold"></span> ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Confirmez la suppression du mode de livraison</div>
              <div class="modal-footer">
                <form action="index?module=bdd&action=supprimer_livraison_mode" method="post">
                  <button class="btn btn-outline-dark rounded-pill" type="button" data-dismiss="modal">Annuler</button>
                  <button class="btn btn-outline-dark rounded-pill">Confirmer</button>
                  <input type="hidden" class="typ_log_id" name="typ_log_id" value="">
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>