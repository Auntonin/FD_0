<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
  <h5 class="my-0 mr-md-auto font-weight-normal">FOOD_DELIVERY</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="index.php">HOME</a>
    <a class="p-2 text-dark" href="shop.php">SHOP</a>
    <a class="p-2 text-dark" href="order.php">CART</a>
    <?php if (isset($_SESSION['rr']) && isset($_SESSION['rd'])) { 
      if($_SESSION['rr']==0 || $_SESSION['rd']==0){
      ?>

      <!-- Button trigger modal -->
      <a class="p-2 text-dark" data-toggle="modal" data-target="#exampleModalCenter">
        REGISTER
      </a>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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


    <?php }}
    if (isset($_SESSION['un']) && $_SESSION['un'] != "") {
    ?>
  </nav>
  <form class="form-inline" action="shop.php" method="POST">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  <div class="dropdown show ml-3">
    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <img src="img/Profile/user/<?= $_SESSION['pro_im']; ?>" width="40" height="40">
      <!-- ::after -->
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <?php if (isset($_SESSION['ulevel']) && $_SESSION['ulevel'] == 0) {
      ?> <a class="dropdown-item" href="admin/admin.php">admin </a>
      <?php  } else ?>


      <a class="dropdown-item" href="user/edit_user.php">Profile </a>
      <?php if (isset($_SESSION['rr']) && $_SESSION['rr'] == 2) { ?>
        <a class="dropdown-item" href="restaurant.php">restaurant</a>
      <?php }
      if (isset($_SESSION['rd']) && $_SESSION['rd'] == 2) { ?>
        <a class="dropdown-item" href="raider.php">raider</a><?php } ?>
      <a class="dropdown-item" href="#">cart</a>
      <a class="dropdown-item" href="user/log-out.php">Log-out</a>
    </div>
  </div>

</div>
<?php
    } else {
?>
  <a type="button" class="btn btn-outline-primary me-2" href="user/login.php">Login</a>
  <a type="button" class="btn btn-primary ml-2" href="user/sing_up.php">Sign-up</a>
<?php } ?>

</div>

</div>