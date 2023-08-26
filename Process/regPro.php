<?php 
include('../connection.php');
if(isset($_POST['register']))
{
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (`username`, `email`, `password`)". 
    "VALUES ('$name', '$email' ,'$password')";
$result = $conn->query($sql);
if (!$result) {
 $errorMessage = "Invalid query : " . $conn->error;
}
header('Location:../login.php');
}
?>