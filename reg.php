<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #00ffae;}
</style>
<?php
$error=0;
$nameErr = $regnErr = $phoneErr = $rlErr = $ldErr = $rdErr = "" ;
$name = $regn = $phone = $rl = $ld = $rd = "" ;

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
    $regnErr = "Please enter your registration number.";
$error=1;
  } else {
    $regn = test_input($_POST["regn"]);
    }
    
  if (empty($_POST["phone"])) {
    $phoneErr = "phone is required";
$error=1;
  } else {
    $phone = test_input($_POST["phone"]);
    }

  if (empty($_POST["ReasonForLeave"])) {
    $rlErr = "Reason for your leave is required!";
  } else {
    $rl = test_input($_POST["reason for leave"]);
  }

if (empty($_POST["LeaveDate"])) {
    $ldErr = "Please enter the date on which you're leaving.";
  } else {
    $ld = test_input($_POST["LeaveDate"]);
  }

if (empty($_POST["ReturnDate"])) {
    $ldErr = "Please enter the date on which you'll be returning.";
  } else {
    $rd = test_input($_POST["ReturnDate"]);
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
 <tr><td>&#8226Registration number: <input type="text" name="regn" value="<?php echo $regn;?>">
  <span class="error">* <?php echo $regnErr;?></span>
  <br><br></td></tr>
  <tr><td>&#8226Phone: <input type="text" name="phone" value="<?php echo $phone;?>">
  <span class="error">*<?php echo $phoneErr;?></span>
  <br><br></td></tr>
 <tr><td>&#8226Reason for leave: <textarea name="comment" rows="5" cols="40"><?php echo $rl;?></textarea>
  <span class="error">*<?php echo $rlErr;?></span>
  <br><br></td></tr>
  <tr><td>&#8226Leave date: <input type="text" name="LeaveDate" value="<?php echo $ld;?>">
  <span class="error">*<?php echo $ldErr;?></span></tr></td>
 <tr><td>&#8226Return date: <input type="text" name="ReturnDate" value="<?php echo $rd;?>">
  <span class="error">*<?php echo $rdErr;?></span>  </tr></td>
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

$sql = "INSERT INTO reg(Name, Registration_number, Phone, Reason_for_leave, Leave_date, Return_date) VALUES
('$name', $regn , $phone , '$rl' , '$rl' , '$ld' , '$rd')";

if(mysqli_query($conn,$sql))
{ echo "Thanks for Registering Dear".$name."Registration number:".$regn;}

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