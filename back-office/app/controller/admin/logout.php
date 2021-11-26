<?php

  unset ($_SESSION["user"]);
  header ("Location: index.php?module=admin&action=login&notif=ok");