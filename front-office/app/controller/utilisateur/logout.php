<?php

  unset($_SESSION["user"]);
  
  header ("Location: index.php?notif=ok");