            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item">
              <a class="text-dark" href="index.php?module=dashboard&action=livraison_modes">Modes de livraison</a>
            </li>
            <li class="breadcrumb-item active">Ajouter un mode de livraison</li>
          </ol>
          <form action="index.php?module=bdd&action=ajouter_livraison_mode" method="post">
            <div class="form-group">
              <label for="title">Mode de livraison</label>
              <input type="text" class="form-control" id="title" name="typ_log_descr" maxlength="255" required>
            </div>
            <div class="form-group">
              <label for="price">Prix</label>
              <input type="text" class="form-control" id="price" name="typ_log_price" required>
            </div>
            <input type="reset" class="btn btn-outline-dark rounded-pill" value="Réinitialiser">
            <button class="confirm btn btn-outline-dark rounded-pill" type="submit">Ajouter</button>
          </form>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>