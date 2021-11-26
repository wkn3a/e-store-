            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item active">Produits</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des produits
              <a class="btn btn-outline-dark rounded-pill" href="index.php?module=dashboard&action=produits_ajouter" role="button">Ajouter</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Numéro</th>
                      <th>Nom du produit</th>
                      <th>Catégorie(s)</th>
                      <th>Description</th>
                      <th>Prix</th>
                      <th>Ajouté</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($produits as $produit) { ?>
                    <tr>
                      <td><img class="image_pro" src="<?= $produit['pro_img_url'] ?>" alt="produit"></td>
                      <td><?= $produit['pro_id'] ?></td>
                      <td><?= $produit['pro_title'] ?></td>
                      <td>
                        <?php
                          $categories = afficher_produit_categories($produit['pro_id']);
                          foreach ($categories as $categorie) {
                            if ($categorie['cat_descr'])
                            echo $categorie["cat_descr"] ?><br>
                        <?php } ?>
                      </td>
                      <td title="<?= $produit['pro_descr'] ?>"><?= substr ($produit['pro_descr'], 0, 100) ?></td>
                      <td><?= $produit['pro_price'] ?> &euro;</td>
                      <td><?= $produit['pro_date'] ?></td>
                      <td>
                        <a class="btn btn-outline-dark rounded-pill" href="index.php?module=dashboard&action=produits_modifier&id=<?= $produit['pro_id'] ?>">Modifier</a>
                        <br>
                        <a class="btn btn-outline-dark rounded-pill mt-3" href="#" data-pro_title="<?= $produit['pro_title'] ?>" data-pro_id="<?= $produit['pro_id'] ?>" data-toggle="modal" data-target="#supprimer_produit">Supprimer</a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Image</th>
                      <th>Numéro</th>
                      <th>Nom du produit</th>
                      <th>Catégorie(s)</th>
                      <th>Description</th>
                      <th>Prix</th>
                      <th>Ajouté</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="supprimer_produit" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Supprimer <span class="pro_title font-weight-bold"></span> ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Confirmez la suppression du produit</div>
              <div class="modal-footer">
                <form action="index.php?module=bdd&action=supprimer_produit" method="post">
                  <button class="btn btn-outline-dark rounded-pill" type="button" data-dismiss="modal">Annuler</button>
                  <button class="btn btn-outline-dark rounded-pill">Confirmer</button>
                  <input type="hidden" class="pro_id" name="pro_id" value="">
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>