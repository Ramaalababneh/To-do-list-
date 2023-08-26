<?php
include('connection.php');

if (isset($_GET["id"])) 
{
    $id = $_GET['id'];
    $sql = "DELETE FROM task WHERE id=$id";
    $conn->query($sql);
}
header ("location:home.php");
exit;
?>