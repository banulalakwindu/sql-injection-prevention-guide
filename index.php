<!DOCTYPE html>
<html>

<head>
    <title>User Details</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">User Details Viewer</h1>
        <p class="text-center">Enter your Username and Password to view your details</p>

        <div class="row justify-content-center mt-5">
            <!-- Bootstrap form styling -->
            <form class="col-6" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="input_username">Enter Username:</label>
                    <input type="text" class="form-control" name="input_username" id="input_username">
                </div>
                <div class="form-group">
                    <label for="input_password">Enter Password:</label>
                    <input type="password" class="form-control" name="input_password" id="input_password">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <?php
    // Check if the user has submitted a form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "testdatabase";

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the user input (assuming it's coming from a form field with the name "input_username" and "input_password")
        $inputUsername = $_POST["input_username"];
        $inputPassword = $_POST["input_password"];

        // Sanitize user inputs to escape from malicious codes
        // $inputUsername = mysqli_real_escape_string($conn, $inputUsername);
        // $inputPassword = mysqli_real_escape_string($conn, $inputPassword);

        // SQL query to retrieve user details based on the input username and password
        $sql = "SELECT * FROM user WHERE Username = '$inputUsername' AND Password = '$inputPassword'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='mt-5'>";
            echo "<table class='table'>";
            echo "<thead class='thead-light'>";
            echo "<tr><th>User ID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
            echo "</thead><tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["UserID"] . "</td>";
                echo "<td>" . $row["Username"] . "</td>";
                echo "<td>" . $row["FirstName"] . "</td>";
                echo "<td>" . $row["LastName"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "</tr>";
            }

            echo "</tbody></table></div>";
        } else {
            echo "<div class='mt-5 alert alert-danger'>No user details found for the provided username and password.</div>";
        }

        // Close the connection
        $conn->close();
    }
    ?>
    </div>
    <!-- Add Bootstrap JS and jQuery links (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>