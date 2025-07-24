
<!-- Checks if there is feedback message from the session, shows feedback message, then removes it. -->
      <?php if (!empty($_SESSION['feedback'])): ?>
            <!-- floating window html-->
          <div class="window" id="window">
        <div class="window-header">
            <span>CONTACT DETAILS</span>
            <button id="minimizeBtn" class="minimize-btn">–</button>
            <!-- removed for now -->
            <!-- <button id="closeBtn" class="header-btn">✕</button> -->
        </div>
        <div class="window-content" id="windowContent"><?php echo $_SESSION['feedback'];
          unset($_SESSION['feedback']);
            ?>
        </div>
    </div>
    <?php endif; ?>
      
        <!-- Checks if there is popup message from the session, shows popup message, then removes it. -->
  <?php
  if (!empty($_SESSION['popup'])) {
      echo "<script>alert('{$_SESSION['popup']}');</script>";
      unset($_SESSION['popup']);
  }
      ?>