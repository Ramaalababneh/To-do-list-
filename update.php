<?php
include('connection.php');
$id = "" ;
$name = "";
$email= "";
$phone = "";
$address = "";
$errorMessage = "";
$successMessage = "";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET method : show the data of task
    if (!isset ($_GET ["id"]))
    {
        header("Location:home.php");
        exit;
    }
    $id = $_GET["id"];
// read the row of selected task from database table
$sql = "SELECT * FROM task WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (!$row){
    header("location:home.php");
    exit;
}

    $name = $row["name"];
    $details = $row["details"];

    }
    else{

    //POST method : Update the data of the task
    $id = $_POST["id"];
    $name = $_POST["name"];
    $details = $_POST["details"];

        if (empty($name) || empty($details)) 
        {
        $errorMessage = "All the fields are required";
     
        }

    $sql = "UPDATE task " . 
    "SET name='$name', details='$details'"  .
    "WHERE id =$id ";

    $result = $conn->query($sql);
    if (!$result) {
        $errorMessage = "Invalid query : " . $conn->error;
      
    }

    $successMessage = "task updated Successfully";

    header("location:home.php");
    exit;
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class= "container my-5">
        <h2>New Task</h2>
        <?php
        if (!empty($errorMessage))
        {
            echo "
            <div class = 'alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
         <!-- http request -->
        <form method = "post"> 
            <input type="hidden" name = "id" value="<?php echo $id;?>">
            <div class = "row mb-3">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
            </div>
            </div>
            <div class = "row mb-3">
            <label class="col-sm-3 col-form-label" >Details</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="details" value="<?php echo $details;?>">
            </div>
            </div>
            <?php
            if (!empty($successMessage)){
            echo "
            <div class='row mb-3'>
            <div class='offset-sm-3 col-sm-6'>
            <div class = 'alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$successMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            </div>
            </div>
            ";
        }
        ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type = "submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="home.php" role="button">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>