
  <?php
  if (!empty($_SESSION['popup'])) {
      echo "<script>alert('{$_SESSION['popup']}');</script>";
      unset($_SESSION['popup']);
  }
  ?> 