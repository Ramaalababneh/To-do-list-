<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my to do list</title>
    <link rel="styleSheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>My To Do List</h2>
        <div class="row d-flex">
        <a class="btn btn-primary col-lg-2" href="create.php" role="button">Add New Task</a>
        <a class="btn btn-warning col-lg-2" style="margin-left:850px" href="login.php" role="button">Log out</a>
        </div>
        
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>Details</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>


            <?php
            include('connection.php');
            session_start();
            if(isset($_SESSION['user_id']))
            {   
                // Read all row from database table
                $sql = "SELECT * FROM task WHERE user_id = '".$_SESSION['user_id']."' ";
                $result = $conn -> query($sql);
                
                if (!$result) {
                    die("Invalid query: " . $conn->error);
                }
                // Read data of each row
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>$row[name]</td>
                        <td>$row[details]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='update.php?id=$row[id]'>Update</a>
                            <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                    ";
                } }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>