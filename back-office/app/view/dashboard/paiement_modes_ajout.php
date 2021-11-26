            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item">
              <a class="text-dark" href="index.php?module=dashboard&action=paiement_modes">Modes de paiement</a>
            </li>
            <li class="breadcrumb-item active">Ajouter un mode de paiement</li>
          </ol>
          <form action="index.php?module=bdd&action=ajouter_paiement_mode" method="post">
            <div class="form-group">
              <label for="title">Mode de paiement</label>
              <input type="text" class="form-control" id="title" name="typ_pay_descr" maxlength="255" required>
            </div>
            <input type="reset" class="btn btn-outline-dark rounded-pill" value="Réinitialiser">
            <button class="confirm btn btn-outline-dark rounded-pill" type="submit">Ajouter</button>
          </form>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>