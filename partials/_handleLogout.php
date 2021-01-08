<?php

  session_start();
  //session_unset();
  session_destroy();
  header("Location: /forum_website/index.php");
  exit;
?>
