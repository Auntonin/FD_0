<div class="d-flex p-3 mb-3 align-items-center border-bottom bg-primary">
  <h5 class="mr-md-auto">FOOD_DELIVERY</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="raider.php">RAIDER</a>
  </nav>

    <a class="p-2 text-dark" href="../index.php">Indedx </a>
    <a class="p-2 text-dark" href="../user/log-out.php">Log-out</a>
    <a href="../user/edit_user.php" role="button">
      <img src="../img/Profile/user/<?= $_SESSION['pro_im']; ?>" width="40" height="40">
      <p class="text-dark"><?= $_SESSION['un'] ?></p>

    </a>
</div>