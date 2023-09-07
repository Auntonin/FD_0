
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
  <h5 class="my-0 mr-md-auto font-weight-normal">FOOD_DELIVERY</h5>
  <nav class="my-2 my-md-0 mr-md-3">
  <a class="p-2 text-dark" href="add_cate_r.php">ADD CATEGORY RESTAURANT</a>
        <a class="p-2 text-dark" href="verify_r.php">VERIFY RESTAURANT</a>
        <a class="p-2 text-dark" href="verify_rd.php">VERIFY RAIDER</a>
        <a class="p-2 text-dark" href="view_u.php">VIEW USER</a>
        |
        <a class="p-2 text-dark" href="../index.php">index</a>
        
 

<?php
    if (isset($_SESSION['un']) && $_SESSION['un'] != "") {
      ?>
  </nav>
  <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> -->
    <?php if (isset($_SESSION['ulevel']) && $_SESSION['ulevel'] == "admin") {
    ?> <a class="text-dark" href="../admin/admin.php">admin </a>
    <?php  } else ?>
    <?php 
      if (isset($_SESSION['rd']) && $_SESSION['rd'] == 2) { ?>
      <a class="p-2 text-dark" href="../raider.php">raider</a><?php } ?>
      
    <a class="p-2 text-dark" href="../user/log-out.php">log-out</a>
    <a  href="../user/edit_user.php" role="button">
    <img src="../img/Profile/user/<?= $_SESSION['pro_im']; ?>" width="40" height="40">
    <!-- ::after -->
  </a>
  </div>
</div>


<?php
    } else {
?>
  <a type="button" class="btn btn-outline-primary me-2" href="../user/login.php">Login</a>
  <a type="button" class="btn btn-primary ml-2" href="../user/sing_up.php">Sign-up</a>
<?php } ?>





