<?php
function SignIn()
{
$con = new mysqli('localhost','root','Sanjay2004','ip');
$n1 = $_POST['Username'];
$n2 = $_POST['password'];
$sql = "SELECT * FROM studentpass where sid = '$n1' AND spw = '$n2'";
$result = $con->query($sql);
if ($result->num_rows > 0)
{
echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
header("Location: student.html");
}
else
{
echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
}
}
if(isset($_POST['btn']))
{
SignIn();
}
?>