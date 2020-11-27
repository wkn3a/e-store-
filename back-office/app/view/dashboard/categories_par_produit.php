            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item active">Catégories par produit</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des catégories par produit
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Produit</th>
                      <th>Catégorie</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($categories as $categorie) { ?>
                    <tr>
                      <td><?= $categorie['pro_title'] ?></td>
                      <td><?= $categorie['cat_descr'] ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Produit</th>
                      <th>Catégorie</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>