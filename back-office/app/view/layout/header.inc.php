<!DOCTYPE html>
<html lang="<?= APP_LANG ?>">
  <head>
    <meta charset="<?= APP_CHARSET ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= PAGE_TITLE ?></title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/modif.css" rel="stylesheet">
  </head>
  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="index"> <?= SITE_NAME ?></a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle">
        <i class="fas fa-bars"></i>
      </button>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
            <i class="fas fa-user-circle fa-fw fa-2x"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#frontoffice">Front-office</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout">Se déconnecter</a>
          </div>
        </li>
      </ul>
    </nav>
    <div class="modal fade" id="logout" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Prêt à partir ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Confirmez si vous voulez fermer la session</div>
          <div class="modal-footer">
            <button class="btn btn-outline-dark rounded-pill" type="button" data-dismiss="modal">Annuler</button>
            <a class="btn btn-outline-dark rounded-pill" href="index.php?module=admin&action=logout">Confirmer</a>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="frontoffice" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Aller sur le site de la boutique ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Confirmez si vous voulez basculer sur WERP Store</div>
          <div class="modal-footer">
            <button class="btn btn-outline-dark rounded-pill" type="button" data-dismiss="modal">Annuler</button>
            <a class="btn btn-outline-dark rounded-pill" href="../../front-office/webroot/index">Confirmer</a>
          </div>
        </div>
      </div>
    </div>
    <div id="wrapper">
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=dashboard&action=produits">
            <i class="fas fa-fw fa-table"></i>
            <span>Produits</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=dashboard&action=categories">
            <i class="fas fa-fw fa-table"></i>
            <span>Catégories</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=dashboard&action=produit_categories">
            <i class="fas fa-fw fa-table"></i>
            <span>Catégories par produit</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=dashboard&action=clients">
            <i class="fas fa-fw fa-table"></i>
            <span>Clients</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=dashboard&action=adresses">
            <i class="fas fa-fw fa-table"></i>
            <span>Adresses</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=dashboard&action=paniers">
            <i class="fas fa-fw fa-table"></i>
            <span>Paniers</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=dashboard&action=commandes">
            <i class="fas fa-fw fa-table"></i>
            <span>Commandes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=dashboard&action=commandes_detail">
            <i class="fas fa-fw fa-table"></i>
            <span>Détail des commandes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=dashboard&action=paiements">
            <i class="fas fa-fw fa-table"></i>
            <span>Paiements</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=dashboard&action=paiement_modes">
            <i class="fas fa-fw fa-table"></i>
            <span>Modes de paiement</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?module=dashboard&action=livraison_modes">
            <i class="fas fa-fw fa-table"></i>
            <span>Modes de livraison</span>
          </a>
        </li>
      </ul>
      <div id="content-wrapper">
        <div class="container-fluid">
          <?php
            if (isset($_GET["notif"])) {
              if ($_GET["notif"] == "nok") {
          ?>
          <h2 style='color: red;'>Action impossible !</h2>
          <?php
            }
            if ($_GET["notif"] == "ok") {
          ?>
          <h2 style='color: green;'>Action réalisée !</h2>
          <?php
              }
            }
          ?>
        </div>
        <div class="container-fluid">
          <p class="font-weight-bold font-italic">
            Bonjour <?= $_SESSION["user"]["cus_firstname"] ?> :)
          </p>
        </div>
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a class="text-dark" href="index"><?= SITE_NAME ?></a>
            </li>