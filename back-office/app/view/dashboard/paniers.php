            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item active">Paniers</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des paniers
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Client</th>
                      <th>Produit</th>
                      <th>Quantité</th>
                      <th>Date d'ajout</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($paniers as $panier) { ?>
                    <tr>
                      <td><?= $panier['cus_mail'] ?></td>
                      <td><?= $panier['pro_title'] ?></td>
                      <td><?= $panier['cad_qt'] ?></td>
                      <td><?= $panier['cad_date'] ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Client</th>
                      <th>Produit</th>
                      <th>Quantité</th>
                      <th>Date d'ajout</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>