<?php
$servername="localhost";
$username="root";
$password="";
$dbname="form";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
	echo "connection failes";
}
else
{

	echo '<html>
	<body>
	<center>
	<form name="myform" method="post">
	<table border="1" width="30%" height="50%">
	<tr>
		<td><h3>Rollno </h3></td>
		<td><input type="text" name="rollno"></td>
	</tr>
	<tr>
		<td><h3>Name</h3></td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td><h3>Gender</h3></td>
		<td><input type="radio" name="gender" value="male">male<input type="radio" name="gender" value="female">female</td>
	</tr>
	<tr>
		<td><h3>Mark</h3></td>
		<td><input type="text" name="mark"></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" name="submit"></td>
	</tr>
	</table>
	</form>
	</center>
	</body>
	</html>';
if(isset($_POST["submit"]))
{
$rollno=$_POST["rollno"];
$name=$_POST["name"];
$gender=$_POST["gender"];
$mark=$_POST["mark"];
$sql="insert into first (rollno,name,gender,mark)values('$rollno','$name','$gender','$mark')";
if(mysqli_query($conn,$sql))
{
echo '<script>alert("NEW RECORD ADDED SUCCESSFULLY");</script>';
}
else
{
echo "error".mysqli_error($conn);
}
$sql1="select * from first";
$result=mysqli_query($conn,$sql1);
if(mysqli_num_rows($result))
{
echo '<center><h3><u>STUDENT DETAILS</u></h3><table border="1" style="bordr-collapse:collapse"><tr><th>rollno</th><th>name</th><th>gender</th><th>mark</th>';
while($row=mysqli_fetch_assoc($result))
{
echo '<tr><td>'.$row["rollno"].'</td><td>'.$row["name"].'</td><td>'.$row["gender"].'</td><td>'.$row["mark"].'</td></tr>';

}
echo '</center></table>';
}
else
{
echo '<script>alert("TABLE IS EMPTY");</script>';
}
mysqli_close($conn);
}
}
?>
