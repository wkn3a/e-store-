            <?php include("../app/view/layout/header.inc.php"); ?>
            <li class="breadcrumb-item">
              <a class="text-dark" href="index?module=dashboard&action=paiement_modes">Modes de paiement</a>
            </li>
            <li class="breadcrumb-item active">Modifier un mode de paiement</li>
          </ol>
          <form action="index?module=bdd&action=modifier_paiement_mode" method="post">
            <div class="form-group">
              <label for="title">Mode de paiement</label>
              <input type="text" class="form-control" id="title" name="typ_pay_descr" maxlength="255" value="<?= $paiement_mode["typ_pay_descr"] ?>" required>
            </div>
            <input name="typ_pay_id" type="hidden" value="<?= $paiement_mode["typ_pay_id"] ?>">
            <input type="reset" class="btn btn-outline-dark rounded-pill" value="Réinitialiser">
            <button class="confirm btn btn-outline-dark rounded-pill" type="submit">Modifier</button>
          </form>
        </div>
        <?php include("../app/view/layout/footer.inc.php"); ?>