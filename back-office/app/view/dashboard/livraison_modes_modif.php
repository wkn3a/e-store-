            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item">
              <a class="text-dark" href="index?module=dashboard&action=livraison_modes">Catégories</a>
            </li>
            <li class="breadcrumb-item active">Modifier un mode de livraison</li>
          </ol>
          <form action="index?module=bdd&action=modifier_livraison_mode" method="post">
            <div class="form-group">
              <label for="title">Mode de livraison</label>
              <input type="text" class="form-control" id="title" name="typ_log_descr" maxlength="255" value="<?= $livraison_mode["typ_log_descr"] ?>" required>
            </div>
            <div class="form-group">
              <label for="price">Prix</label>
              <input type="text" class="form-control" id="price" name="typ_log_price" value="<?= $livraison_mode["typ_log_price"] ?>" required>
            </div>
            <input name="typ_log_id" type="hidden" value="<?= $livraison_mode["typ_log_id"] ?>">
            <input type="reset" class="btn btn-outline-dark rounded-pill" value="Réinitialiser">
            <button class="confirm btn btn-outline-dark rounded-pill" type="submit">Modifier</button>
          </form>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>