            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item">
              <a class="text-dark" href="index?module=dashboard&action=categories">Catégories</a>
            </li>
            <li class="breadcrumb-item active">Modifier une catégorie</li>
          </ol>
          <form action="index?module=bdd&action=modifier_categorie" method="post">
            <div class="form-group">
              <label for="title">Nom de la catégorie</label>
              <input type="text" class="form-control" id="title" name="cat_descr" maxlength="255" value="<?= $categorie["cat_descr"] ?>" required>
            </div>
            <div class="form-group">
              <label for="img_url">Adresse de l'image</label>
              <input type="url" class="form-control" id="img_url" name="cat_img_url" value="<?= $categorie["cat_img_url"] ?>" required>
            </div>
            <input name="cat_id" type="hidden" value="<?= $categorie["cat_id"] ?>">
            <input type="reset" class="btn btn-outline-dark rounded-pill" value="Réinitialiser">
            <button class="confirm btn btn-outline-dark rounded-pill" type="submit">Modifier</button>
          </form>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>