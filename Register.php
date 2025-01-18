<?php
function register()
{
$con = mysqli_connect('localhost','root','Sanjay2004','ip');
$v1 = $_POST['Username'];
 $v2 = $_POST['mail'];
$v3 = $_POST['password'];
$sql1 = "insert into facultypass values ('$v1','$v2','$v3')";
if(mysqli_query($con,$sql1))
{
echo "Registerd Successfully";
}
else
{
echo mysqli_error($con);
}
}
if(isset($_POST['s']))
{
register();
}
?>