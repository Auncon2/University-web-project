<?php
        $user_id = $_SESSION['user_id'];

        $query = "SELECT * FROM payment AS p JOIN rent AS a ON p.user_id = a.user_id WHERE p.user_id = $user_id;";
        $run_query = mysqli_query($con,$query);

        if($run_query)?>{
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Location</th>
                    <th scope="col">Description</th>
                    <th scope="col">Payment Amount (in Taka)</th>
                    <th scope="col">Paymnent Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_array($run_query)): ?>
                    <tr>
                      <td><?php echo $row['car_location'] ?></td>
                      <td><?php echo $row['car_description'] ?></td>
                      <td><?php echo $row['payment_amount'] ?></td>
                      <td><?php echo $row['payment_date'] ?></td>
                    </tr>
               <?php endwhile; ?>
                </tbody>
              </table>
        }

<!--        else{
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
            } -->
}
