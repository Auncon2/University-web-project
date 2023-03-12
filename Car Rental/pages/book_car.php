<?php if(isset($_SESSION['user_id'])) {

  if(isset($_POST['action']) && $_POST['action'] == 'add_Car')
  {

  //  $acc_price=$_POST['acc_price'];
  $user_id = $_SESSION['user_id'];
  $room_price = $_GET['room_price'];

  $query="INSERT INTO payment (user_id, payment_amount, payment_date) values('$user_id','$room_price',CURDATE())";
  $query_run=mysqli_query($con,$query);

  if($query_run){

    echo "<script type='text/javascript'>
    Swal.fire({
      title: 'Success!',
      text: 'Room booked',
      icon: 'success',
      confirmButtonText: 'Cool'
    })
    </script>";

  }

  else{
    echo '<script type="text/javascript">toastr.warning("unknown error", {progressBar:true});</script>';
    //echo("Error description: " . mysqli_error($con));
    echo "<script type='text/javascript'>
    Swal.fire({
      title: 'Error!',
      text: 'We cannot add room now',
      icon: 'error',
      confirmButtonText: 'Cool'
    })
    </script>";
  }

}
?>




<div  class="container">
  <div  class="row">
    <div  class="col-8 offset-2">
      <form class="myform" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_baggage">









<!--

        <div class="form-group">
          <label for="exampleInputPrice">Price</label>
          <input name="bag_price" type="text" class="form-control" id="exampleInputPrice">
        </div>
-->
           <h4>Do you want to pay <?= $_GET['room_price'] ?> tk? </h4>
        <button type="submit" class="btn btn-success">Payment</button>
      </form>
    </div>
  </div>
</div>

<?php
}
else
{
  echo "<div  class='container'>
    <div  class='row'>
      <div  class='col-8 offset-2'>";
echo "<div class='alert alert-warning' role='alert'>
  You are not logged in.
</div>";
echo "    </div>
  </div>
</div>";
} ?>
