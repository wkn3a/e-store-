            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item">
              <a class="text-dark" href="index.php?module=dashboard&action=produit">Produits</a>
            </li>
            <li class="breadcrumb-item active">Ajouter un produit</li>
          </ol>
          <form action="index.php?module=bdd&action=ajouter_produit" method="post">
            <div class="form-group">
              <label for="title">Nom du produit</label>
              <input type="text" class="form-control" id="title" name="pro_title" maxlength="255" required>
            </div>
            <div class="form-group">
              <label for="descr">Description</label>
              <textarea class="form-control" id="descr" rows="3" name="pro_descr" required></textarea>
            </div>
            <div class="form-group">
              <label for="price">Prix</label>
              <input type="text" class="form-control" id="price" name="pro_price" required>
            </div>
            <div class="form-group">
              <label for="img_url">Adresse de l'image</label>
              <input type="url" class="form-control" id="img_url" name="pro_img_url" required>
            </div>
            <div class="form-group">
              <label class="mr-3 categories">Catégorie(s)</label>
              <?php foreach ($categories as $categorie) { ?>
              <input class="categorie_checkbox" type="checkbox" name="cat_id[]" value="<?= $categorie["cat_id"] ?>"> <?= $categorie["cat_descr"] ?><br>
              <?php } ?>
            </div>
            <input type="reset" class="btn btn-outline-dark rounded-pill" value="Réinitialiser">
            <button class="confirm btn btn-outline-dark rounded-pill" type="submit">Ajouter</button>
          </form>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>