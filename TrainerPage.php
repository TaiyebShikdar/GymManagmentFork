<?php
/*
require_once 'includes/DBConnection.php';
$query = "SELECT * FROM member";
$conn = OpenCon();
$result = $conn->query($query);
print $result->num_rows[0];
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register-ModernGym</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <link rel="stylesheet" href="css/trainerPage.css">
</head>
<body>

<header>
  <h1>Trainer Page</h1>
</header>

<main>
  <div class="sidebar">
    <div class="search-section">
      <h2>Search Members</h2>
      <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search...">
        <button type="button" id="searchButton">Search</button>
      </div>
    </div>
  </div>
  <div class="content">
  <form action="process.php" method="post">
    <label for="recordSelect">Select a Record:</label>
    <select name="recordSelect" id="recordSelect">
        <?php
        // Establish a connection to MySQL
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

        // Fetch records from the database
        $sql = "SELECT memberID, name FROM member";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["memberID"] . "'>" . $row["memberID"] . "</option>";
                
            }
        } else {
            echo "0 results";
        }

        // Close the database connection
        $conn->close();
        ?>
    </select>
    <input type="submit" value="Submit">
</form>

  </div>
</main>
<script src="js/script.js"></script>
</body>
</html>
