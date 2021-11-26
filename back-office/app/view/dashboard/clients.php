            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item active">Clients</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des clients
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>E-mail</th>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Civilité</th>
                      <th>Abonné</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($clients as $client) { ?>
                    <tr>
                      <td><?= $client['cus_mail'] ?></td>
                      <td><?= $client['cus_lastname'] ?></td>
                      <td><?= $client['cus_firstname'] ?></td>
                      <td><?php if ($client['cus_civility'] == 1) echo "Homme"; else echo "Femme"; ?></td>
                      <td><?php if ($client['cus_subscriber'] == 0) echo "Non" ; else echo "Oui"; ?></td>
                      <td><a class="btn btn-outline-dark rounded-pill" href="#" data-cus_mail="<?= $client['cus_mail'] ?>" data-cus_id="<?= $client['cus_id'] ?>" data-toggle="modal" data-target="#supprimer_client">Supprimer</a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>E-mail</th>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Civilité</th>
                      <th>Abonné</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="supprimer_client" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Supprimer <span class="cus_mail font-weight-bold"></span> ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Confirmez la suppression du compte</div>
              <div class="modal-footer">
                <form action="index.php?module=bdd&action=supprimer_client" method="post">
                  <button class="btn btn-outline-dark rounded-pill" type="button" data-dismiss="modal">Annuler</button>
                  <button class="btn btn-outline-dark rounded-pill">Confirmer</button>
                  <input type="hidden" class="cus_id" name="cus_id" value="">
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>