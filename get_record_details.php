<?php
// Check if the ID parameter is sent via GET request
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Database connection parameters
    $servername = "localhost"; // Change this to your MySQL server name
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "gym_management"; // Change this to your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement with a parameter
    $sql = "SELECT routine FROM records WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Bind the parameter
    $stmt->bind_param("i", $_GET['id']); // Assuming 'id' is an integer

    // Execute the query
    $stmt->execute();

    // Get the result
    $stmt->bind_result($routine);

    // Fetch and output record details
    if ($stmt->fetch()) {
        echo $routine; // Output the routine details as a response
    } else {
        echo "No record found";
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>