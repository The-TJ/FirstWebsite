<!--PHP code that gets data from the contact from and dumps it into the MySQL database-->

<?php
include ("constDatabase.php");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));

    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $county=$_POST['county'];
    $sub=$_POST['subject'];
    $num=$_POST['number'];
   $query=mysqli_query($con, "INSERT INTO messages values(NULL,'$fname','$lname','$num','$county','$sub', NOW())") or die(mysqli_error($con));
   if($query)
   {
    echo "<script type='text/javascript'>alert('Message Sent Successfully!');
                    window.location='contact.html';
                        </script>";
     }    
 else{
      echo "<script type='text/javascript'>alert('Error in sending message!');
                    window.location='contact.html';
                        </script>";
        }

?>
