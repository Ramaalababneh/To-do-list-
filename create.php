<?php
// Include the database connection
include('connection.php');

// Initialize variables to store form data and messages
$name = "";
$details = "";
$errorMessage = "";
$successMessage = "";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST["name"];
    $details = $_POST["details"];

    // Check if any field is empty
    if (empty($name) || empty($details)) {
        $errorMessage = "All fields are required";
    } else {
        // Start a session to access user ID
        session_start();
        $user_id = $_SESSION['user_id'];

        // Prepare and execute the INSERT query using a prepared statement
        $sql = "INSERT INTO task (`name`, `details`, `user_id`) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $details, $user_id);

        if ($stmt->execute()) {
            $successMessage = "Task added successfully";
            header('Location:./home.php');
        } 
        else {
            $errorMessage = "Error adding task: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Add New Task</h2>
        <?php
        // Display error message if present
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }

        // Display success message if present
        if (!empty($successMessage)) {
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <!-- Task submission form -->
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Details</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="details" value="<?php echo $details; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-6 d-grid">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
