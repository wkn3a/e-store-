<?php

  unset ($_SESSION["user"]);
  header ("Location: index?module=admin&action=login&notif=ok");