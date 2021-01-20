<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #00ffae;}
</style>
<?php
$error=0;
$nameErr = $Registration_numberErr = $PhoneErr = $Reason_for_leaveErr = $Leave_dateErr = $Return_dateErr = "" ;
$name = $Registration_number = $Phone = $Reason_for_leave = $Leave_date = $Return_date = "" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
$error=1;
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
$error=1;
    }
  }
  
  if (empty($_POST["regn"])) {
    $Registration_numberErr = "Please enter your registration number.";
$error=1;
  } else {
    $Registration_number = test_input($_POST["regn"]);
    }
    
  if (empty($_POST["phone"])) {
    $PhoneErr = "phone is required";
$error=1;
  } else {
    $Phone = test_input($_POST["phone"]);
    }

  if (empty($_POST["rl"])) {
    $Reason_for_leaveErr = "Reason for your leave is required!";
  } else {
    $Reason_for_leave = test_input($_POST["rl"]);
  }

if (empty($_POST["LeaveDate"])) {
    $Leave_dateErr = "Please enter the date on which you're leaving.";
  } else {
    $Leave_date = test_input($_POST["LeaveDate"]);
  }

if (empty($_POST["ReturnDate"])) {
    $Return_dateErr = "Please enter the date on which you'll be returning.";
  } else {
    $Return_date = test_input($_POST["ReturnDate"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</head>
<body bgcolor="grey">
<font face="times new roman" size="4">
<b> 
<center><h2>Leave Registration</h2></center>
<hr>
<table>
<tr>
<p><span class="error">* required field.</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<td> <p>&#8226Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br></td>
<td><img src="l.jpg"></td> </tr>
 <tr><td>&#8226Registration number: <input type="text" name="regn" value="<?php echo $Registration_number;?>">
  <span class="error">* <?php echo $Registration_numberErr;?></span>
  <br><br></td></tr>
  <tr><td>&#8226Phone: <input type="text" name="phone" value="<?php echo $Phone;?>">
  <span class="error">*<?php echo $PhoneErr;?></span>
  <br><br></td></tr>
 <tr><td>&#8226Reason for leave: <textarea name="rl" rows="5" cols="40" value="<?php echo $Reason_for_leave;?>"></textarea>
  <span class="error">*<?php echo $Reason_for_leaveErr;?></span>
  <br><br></td></tr>
  <tr><td>&#8226Leave date(YYYY/MM/DD): <input type="text" name="LeaveDate" value="<?php echo $Leave_date;?>">
  <span class="error">*<?php echo $Leave_dateErr;?></span></tr></td>
 <tr><td>&#8226Return date(YYYY/MM/DD): <input type="text" name="ReturnDate" value="<?php echo $Return_date;?>">
  <span class="error">*<?php echo $Return_dateErr;?></span>  </tr></td>
<tr><td>  <input type="submit" name="submit" value="Submit">  </tr></td>
</p>
</table>
</form>
</font>

<br>
<br>
<?php
if (isset($_POST["submit"]) && $error==0)
{ 
	if(isset($_POST['submit'])) 
	{
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = 'user';
	    $dbname = 'hostelm';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
             
            if(!$conn) {
               die('Could not connect: ' . mysqli_error());
            }	
	else { echo "connected succcessfully"; }

$sql = "INSERT INTO regl (Name, Registration_number, Phone, Reason_for_leave, Leave_date, Return_date) VALUES
('$name', $Registration_number , $Phone , '$Reason_for_leave' , '$Leave_date' , '$Return_date')";

if(mysqli_query($conn,$sql))
{ echo "Thanks for Registering Dear"."<br>".$name."<br>"."Registration number:".$Registration_number;}

else{ echo "not entered";}

}}

?>

</td>
</tr>
</table>
</b>
</font>
</body>
</html>