<div class="album py-5 bg-light">
  <div class="container">
    <?php
    $query="SELECT * FROM rent";

    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
      ?>
      <div class="row">
      <?php
      foreach ($query_run as $row) {
        ?>

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img src="<?= $row['rent_photo'] ?>" class="img-thumbnail">
              <div class="card-body">
                <p class="card-text"><?= $row['car_description'] ?></p>
                <p class="card-text"><?= $row['car_location'] ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <a href="index.php?page=book_car&car_id=<?= $row['r_id'] ?>&room_price=<?= $row['rent_price'] ?>" class="btn btn-sm btn-outline-info">Reservation</a>
                  <small class="text-muted"><?= $row['rent_price'] ?> tk</small>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <?php
    }
    else
    {
      //invalid
      echo '<script type="text/javascript"> alert("No adds to show!!!")</script>';
    }
    ?>
  </div>
</div>
