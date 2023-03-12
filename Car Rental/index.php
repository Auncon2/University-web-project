<?php
session_start();
include 'backend/connection.php';
include 'backend/header.php';
?>

  <body>
    <?php
    include 'backend/navbar.php';
    ?>
    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1><?php if(isset($_GET['page'])) {echo $_GET['page'];} else { echo 'Home'; } ?></h1>
          <p class="lead text-muted">Ride with our Car Rental Service and get special discount for your next trip.</p>
          <p>
            <a href="?page=rent" class="btn btn-primary my-2">Browse Car</a>
            <a href="?page=AddCar" class="btn btn-primary my-2">Add your Car</a>
            <a href="?page=profile" class="btn btn-primary my-2">Profile</a>

            <!-- <a href="?page=baggage-transport" class="btn btn-secondary my-2">Baggage Transport</a> -->
          </p>
        </div>
      </section>

    </main>
    <?php if(isset($_GET['page'])) {
        include 'pages/'.$_GET['page'].'.php';
    } else {
      include 'pages/content.php';
    }
    ?>


    <footer class="text-muted">
      <div class="container">
        <?php
        include 'backend/footer.php';
        ?>
      </div>
    </footer>
  </body>
</html>
