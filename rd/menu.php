<div class="d-flex p-3 mb-3 align-items-center border-bottom">
  <h5 class="mr-md-auto">FOOD_DELIVERY</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="../index.php">HOME</a>
    <a class="p-2 text-dark" href="raider.php">RAIDER</a>

      <?php 
    if (isset($_SESSION['un']) && $_SESSION['un'] != "") {
      ?>
  </nav>
    <a class="p-2 text-dark" href="user/log-out.php">Log-out</a>
    <a  href="user/edit_user.php" role="button">
    <img src="img/Profile/user/<?= $_SESSION['pro_im']; ?>" width="40" height="40">
    <!-- ::after -->
  </a>
 


<?php
    } else {
?>
  <a type="button" class="btn btn-outline-primary me-2" href="user/login.php">Login</a>
  <a type="button" class="btn btn-primary ml-2" href="user/sing_up.php">Sign-up</a>
<?php } ?>
</div>
</div>


