<?php

  unset($_SESSION["user"]);
  
  header ("Location: index?notif=ok");