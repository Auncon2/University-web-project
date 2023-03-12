<?php if(isset($_SESSION['user_id'])) {

  if(isset($_POST['action']) && $_POST['action'] == 'rent')
  {
    $user_id = $_SESSION['user_id'];
    $userdescription = $_POST['car_description'];
    $userlocation = $_POST['car_location'];
    $price = $_POST['rent_price'];
    $errors = [];

    if (isset($_FILES['rent_photo'])) {
      $file_getname = $_FILES['rent_photo']['name'];
      $file_extention = strtolower(pathinfo($file_getname ,PATHINFO_EXTENSION));
      $file_dir = 'uploads/';
      $file_name = 'DCIM_' . date('YmdHi', time());

      $file_size =$_FILES['rent_photo']['size'];
      $file_tmp =$_FILES['rent_photo']['tmp_name'];
      $image_data = getimagesize($file_tmp);
      $file_type = $image_data['mime'];

      $maxFileSize = 2 * 10e6;
      $allowedExtention = ['jpg', 'jpeg', 'png', 'gif'];
      $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];

      if (!file_exists($file_tmp)) $errors[] = 'Image file is missing in the server';
      if($file_size > 716000) $errors[]='File size must be less than 700kB';
      if ($file_size == 0) $errors[]='File size must be greater than 0kB';
      if (!$image_data) $errors[] = 'Invalid image';
      if (!in_array($file_extention, $allowedExtention)) $errors[] = 'Only jpeg, jpg, png and gif extentions are allowed';
      if (!in_array($file_type, $allowedMimeTypes)) $errors[] = 'Only JPEG, PNG and GIFs are allowed';
      if (is_dir($file_dir)==false) mkdir($file_dir, 0755);

      if (empty($errors)==true) {
        $uploaded = move_uploaded_file($file_tmp,$file_dir . $file_name . '.' . $file_extention);
        chmod($file_dir . $file_name . '.' . $file_extention, 0644);

        if ($uploaded==true) {
          $photo = $file_dir . $file_name . '.' . $file_extention;
          $query="INSERT INTO rent (user_id, car_description, car_location, rent_price, rent_photo) values('$user_id','$userdescription','$userlocation','$price','$photo')";
          $query_run=mysqli_query($con,$query);

          if($query_run){
            echo "<script type='text/javascript'>
            Swal.fire({
              title: 'Success!',
              text: 'Car added',
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
              text: 'We cannot add Car now',
              icon: 'error',
              confirmButtonText: 'Cool'
            })
            </script>";
          }
        }
      }
      else {
        echo '<script type="text/javascript">toastr.warning("unknown error", {progressBar:true});</script>';
      }


    }

  }
?>

<div  class="container">
  <div  class="row">
    <div  class="col-8 offset-2">
      <form class="myform" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="rent">
        <div class="form-group">
          <label for="exampleInputDescription">Description Of your Car</label>
          <input name="car_description" type="text" class="form-control" id="exampleInputDescription" aria-describedby="emailHelp">
          <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
          <label for="exampleInputuserLocation">Location</label>
          <input name="car_location" type="text" class="form-control" id="exampleInputLocation" aria-describedby="emailHelp">
          <!-- <small id="usernameHelp" class="form-text text-muted"></small> -->
        </div>
        <div class="form-group">
          <label for="exampleInputPrice">Price</label>
          <input name="rent_price" type="text" class="form-control" id="exampleInputPrice">
        </div>

        <div class="form-group">
          <label for="exampleInputphoto">Pictures</label>
          <input name="rent_photo" type="file" class="form-control" id="exampleInputphoto" aria-describedby="emailHelp">
          <!-- <small id="phoneHelp" class="form-text text-muted"></small> -->
        </div>
        <button type="submit" class="btn btn-success">Add</button>
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
