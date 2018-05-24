<!--PHP code to print the contents of the MYSQL database-->

<?php
include("constDatabase.php");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database: " . mysqli_error($con));
$query1 = mysqli_query($con,"SELECT * FROM messages order by dtime asc") or die(mysqli_error($con));
$query2 = mysqli_query($con,"SELECT * FROM book order by day and time") or die(mysqli_error($con));
 ?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" href="includes/w3-style.css">
<style>
table {
    font-family: "Lato", sans-serif;
   border-spacing: 5px 12px;
  padding: 0 8px 8px 0;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
   <body>
       
       <div class="w3-main">
<div id="body">
   <?php if(mysqli_num_rows($query1)==0)
{
	echo "You have no messages.";
} 
else{ ?>
    <h2>Your Messages</h2>
  <table >
	<tr style="font-size:25px">
    	<th>First Name</th>
        <th>Last Name</th>
        <th>Number</th>
         <th>County</th>
         <th>Subject</th>
         <th>Sent on</th>
        </tr> 
<?php while($msg=mysqli_fetch_array($query1))
{
?>
	<tr style="font-size:15px">
    	<td><?php echo $msg['first_name']; ?></td>
    	<td><?php echo $msg['last_name']; ?></td>
    	<td><?php echo $msg['number']; ?></td>
        <td><?php echo $msg['county']; ?></td>
        <td><?php echo $msg['sub']; ?></td>
        <td><?php echo $msg['dtime']; ?></td>
    </tr>
<?php
}
}
?>
    <br><br>
</table>
    
    <?php if(mysqli_num_rows($query2)==0)
{
	echo "You have no bookings.";
} 
else{ ?>
    <h2>Your Bookings</h2>
  <table >
	<tr style="font-size:25px">
    	<th>First Name</th>
        <th>Last Name</th>
        <th>Tour Day</th>
         <th>Tour Time</th>
        </tr> 
<?php while($book=mysqli_fetch_array($query2))
{
?>
	<tr style="font-size:15px">
    	<td><?php echo $book['first_name']; ?></td>
    	<td><?php echo $book['last_name']; ?></td>
    	<td><?php echo $book['day']; ?></td>
        <td><?php echo $book['time']; ?></td>
    </tr>
<?php
}
}
?>
</table>
</div>
       </div>
       </body>
       </html>


