<div class="d-flex p-3 mb-3 align-items-center border-bottom bg-warning">
  <h5 class="mr-md-auto">FOOD_DELIVERY</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="index.php">HOME</a>
    <a class="p-2 text-dark" href="show_shop.php">SHOP</a>

    <?php if (isset($_SESSION['rr']) && isset($_SESSION['rd'])) {
      if ($_SESSION['rr'] == 0 || $_SESSION['rd'] == 0) {
    ?>
        <!-- Button trigger modal -->
        <a class="p-2 text-dark" data-toggle="modal" data-target="#RegisterModal">
          REGISTER
        </a>
        <!-- Modal -->
        <div class="modal fade" id="RegisterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Rsegister</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-center">
                <a class="btn btn-outline-primary m-2" href="user/register_r.php">Register Restaurant</a>
                <a class="btn btn-outline-primary ms-2" href="user/register_rd.php">Register Raider</a>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>


      <?php }
    }
    if (isset($_SESSION['un']) && $_SESSION['un'] != "") {
      ?>
          <a class="p-2 text-dark" href="order/order.php">CART</a>
          <a class="p-2 text-dark" href="show_order_record.php">ORDER</a>
  </nav>


 
  <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> -->
    <?php if (isset($_SESSION['ulevel']) && $_SESSION['ulevel'] == "admin") {
    ?> <a class="text-dark p-2" href="admin/admin.php">admin </a>
    <?php  } else ?>


      
    <?php if (isset($_SESSION['rr']) && $_SESSION['rr'] == 2) { ?>
      <a class="p-2 text-dark" href="restaurant/rest.php">restaurant</a>
    <?php }
      if (isset($_SESSION['rd']) && $_SESSION['rd'] == 2) { ?>
      <a class="p-2 text-dark" href="raider/raider.php">raider</a><?php } ?>
      <form class="form-inline" action="show_shop.php" method="POST">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
    <button class="btn btn-outline-success m-2 my-sm-0" type="submit">Search</button>
  </form>
    <a class="p-2 text-dark" href="user/log-out.php">Log-out</a>
    <a  href="user/edit_user.php" role="button">
    <img src="img/Profile/user/<?= $_SESSION['pro_im']; ?>" width="40" height="40">
    <p class="text-dark"><?= $_SESSION['un'] ?></p>
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


