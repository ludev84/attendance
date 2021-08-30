<?php
  // This includes the session_start() to resume the session on this page. It idetntifies the session that needs to be closed.
  include_once 'includes/session.php';
  session_destroy();
  header('Location: index.php');