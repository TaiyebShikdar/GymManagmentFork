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
    
    <?php


    ?>
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

  <form action="process.php" method="post">
    <label for="recordSelect">Select a Record:</label>
    <select name="recordSelect" id="recordSelect">
      
        <?php
        
        
        $servername = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $dbname = "gym_management"; 

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch records from the database
        $sql = "SELECT memberID, name FROM member";
        $results = $conn->query($sql);
        echo "test";
        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<select name='test'>";
            foreach($results as $row) {
                echo "<option value='" . $row['memberID'] . "'>" . $row['username'] . "</option>";
            }    
            echo "</select>";
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
