<!--PHP code that gets data from the Tour form and dumps it into the MySQL database-->

<?php
include ("constDatabase.php");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));

    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $day=$_POST['date'];
    $time=$_POST['time'];
   $query=mysqli_query($con, "INSERT INTO book values(NULL,'$fname','$lname','$day','$time')") or die(mysqli_error($con));
   if($query)
   {
    echo "<script type='text/javascript'>alert('Tour booked Successfully!');
                    window.location='tour.html';
                        </script>";
     }    
 else{
      echo "<script type='text/javascript'>alert('Error in booking!');
                    window.location='tour.html';
                        </script>";
        }

?>
