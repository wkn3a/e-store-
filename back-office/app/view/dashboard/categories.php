            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item active">Catégories</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des catégories
              <a class="btn btn-outline-dark rounded-pill" href="index?module=dashboard&action=categories_ajouter" role="button">Ajouter</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Nom de la catégorie</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($categories as $categorie) { ?>
                    <tr>
                      <td><img src="<?= $categorie['cat_img_url'] ?>" style="height: 100px;" alt=""></td>
                      <td><?= $categorie['cat_descr'] ?></td>
                      <td>
                        <a class="btn btn-outline-dark rounded-pill" href="index?module=dashboard&action=categories_modifier&id=<?= $categorie['cat_id'] ?>">Modifier</a>
                        <br>
                        <a class="btn btn-outline-dark rounded-pill mt-3" href="#" data-cat_descr="<?= $categorie['cat_descr'] ?>" data-cat_id="<?= $categorie['cat_id'] ?>" data-toggle="modal" data-target="#supprimer_categorie">Supprimer</a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Image</th>
                      <th>Nom de la catégorie</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="supprimer_categorie" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Supprimer <span class="cat_descr font-weight-bold"></span> ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Confirmez la suppression de la catégorie</div>
              <div class="modal-footer">
                <form action="index?module=bdd&action=supprimer_categorie" method="post">
                  <button class="btn btn-outline-dark rounded-pill" type="button" data-dismiss="modal">Annuler</button>
                  <button class="btn btn-outline-dark rounded-pill">Confirmer</button>
                  <input type="hidden" class="cat_id" name="cat_id" value="">
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>