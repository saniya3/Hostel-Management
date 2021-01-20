html>
<head>
<font color="red">
<center>
 <style> body { background-image: url("h.jpg"); background-repeat: no-repeat; } </style> 
</head>
<center><h1> VIEW YOUR DATA</H1></center>
</font>
<font align="right">
<a href="home.html"> <font face="monotypecorsivia" color="black">Go BACK</font> </a>
<br>
<a href="reg.php"> <font face="monotypecorsivia" color="black">REGISTER</font></a>
</font>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<input type="text" name="t1">
<?php
	    $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = 'user';
	    $dbname=  'hostelm';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
             
            if(!$conn) 
	 {
               die('Could not connect: ' . mysqli_error());
         }	
if(isset($_POST['submit']))
{
$f1=$_POST['t1'];
}
$sql= "SELECT Name,Registration_number,Phone,Reason_for_leave,Leave_date,Return_date from regl where Registration_number='$t1';
echo "<b>";
echo "Following are the leave registrations made by you:";
echo "</b>";
echo "<br>";
echo "<br>";
echo "<br>";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{	
	echo"Name                       :".$row["Name"]."<br>"."<br>";
	echo"Registration number        :".$row["Registration_number"]."<br>"."<br>";
	echo"Phone number               :".$row["phone"]."<br>"."<br>";
	echo"Reason for leave           :".$row["depreason_for_leave"]."<br>"."<br>";
        echo"Leave date                 :".$row["Leave_date"]."<br>"."<br>";
        echo"Return date                :".$row["Return_date"]."<br>"."<br>";
        echo "<br>";
        echo "<br>";
	
	}
}
	else
	{
	echo"NO RECORD FOUND";
	}	
mysqli_close($conn);


?>
</body>
</HTML>
