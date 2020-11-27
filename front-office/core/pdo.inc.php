<?php

  try {
    $dns = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $options = array (
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $pdo = new PDO ($dns, DB_USER, DB_PASSWORD, $options);
  }
  catch (Exception $e) {
    die ("Impossible de se connecter à MySQL : " . utf8_encode($e->getMessage()));
  }