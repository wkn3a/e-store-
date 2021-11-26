    <?php include ("../app/view/layout/header.inc.php"); ?>
    <div class="home-1" id="page">
      <?php include ("../app/view/layout/header2.inc.php"); ?>
      <?php
        if (isset($_GET['notif'])){
          if ($_GET['notif'] == 'deleteok') {
      ?>
      <div class="alert alert-success" role="alert">
        Vote compte a bien été supprimé :(
      </div>
      <?php }
          if ($_GET['notif'] == 'deletenok') { ?>
      <div class="alert alert-danger" role="alert">
        Votre compte n'a pas été supprimé :)
      </div>
      <?php }
          if ($_GET['notif'] == 'logok') { ?>
      <div class="alert alert-success" role="alert">
        Vous êtes connecté !
      </div>
      <?php } } ?>
      <div class="banner banner-image-fit-screen">
        <div class="rev_slider slider-home-1" id="slider_1"><div>
            <h1 class="title text-center">WERP</h1>
          </div>
          <ul>
            <li>
              <img class="rev-slidebg tomato" src="https://cdn.pixabay.com/photo/2019/03/12/09/18/tomatoes-4050245_1280.jpg" alt="demo" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10">
            </li>
          </ul>
        </div>
      </div>
      <section class="boxed-sm">
        <div class="container">
          <div class="row">
            <div class="product-category-grid-style-1">
              <div class="row">
                <?php foreach ($categories as $categorie) { ?>
                <div class="col-sm-4">
                  <a href="index.php?module=produit&action=index&id=<?= $categorie["cat_id"] ?>">
                    <figure class="product-category-item">
                      <div class="thumbnail">
                        <img src="<?= $categorie["cat_img_url"] ?>" alt="">
                      </div>
                      <figcaption>
                        <h3><?= $categorie["cat_descr"] ?></h3>
                      </figcaption>
                    </figure>
                  </a>
                </div>
                <?php } ?>
                <div class="col-sm-4">
                  <a href="index.php?module=produit&action=index">
                    <figure class="product-category-item">
                      <div class="thumbnail">
                        <img src="https://static-cms.carrefour.fr/sites/default/files/2019-05/tous-rayons-icon.png?itok=OFJWhbkj" alt="img">
                      </div>
                      <figcaption>
                        <h3>Tout le catalogue</h3>
                      </figcaption>
                    </figure>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="call-to-action-style-1">
        <img class="rellax bg-overlay" src="https://cdn.pixabay.com/photo/2015/12/12/14/57/giant-rubber-bear-1089612_1280.jpg" alt="img2">
        <div class="overlay-call-to-action"></div>
        <div class="container">
          <div class="row">
            <p class="h3"><?= SLOGAN_TITLE ?></p>
            <h2><?= SLOGAN_TAGLINE ?></h2>
          </div>
        </div>
      </div>
    </div>
    <?php include ("../app/view/layout/footer.inc.php"); ?>