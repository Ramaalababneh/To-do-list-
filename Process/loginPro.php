<?php 
include('../connection.php');
if(isset($_POST['login']))
{
    $name = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$name'";
    $result = $conn -> query($sql);
    
    if (!$result) {
        die("Invalid query: " . $conn->error);
    }
    // Read data of one row
        $row = $result->fetch_assoc();
        if($name== $row['email'] && $password== $row['password'])
        {   
            session_start();
            $_SESSION['user_id']=$row['id'];
            
            header('Location:../home.php');
            exit();
        }

        else
        {
            header('Location:./invalid.php');
            exit();
        }

}  

?>