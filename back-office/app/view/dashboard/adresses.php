            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item active">Adresses</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des adresses
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Client</th>
                      <th>Adresse</th>
                      <th>Complément d'adresse</th>
                      <th>Code postal</th>
                      <th>Ville</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($adresses as $adresse) { ?>
                    <tr>
                      <td><?= $adresse['cus_mail'] ?></td>
                      <td><?= $adresse['add_address1'] ?></td>
                      <td><?= $adresse['add_address2'] ?></td>
                      <td><?= $adresse['add_zipcode'] ?></td>
                      <td><?= $adresse['add_city'] ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Client</th>
                      <th>Adresse</th>
                      <th>Complément d'adresse</th>
                      <th>Code postal</th>
                      <th>Ville</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>