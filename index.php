<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "hng-firstdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO info (github, slack)
VALUES ('Usheninte', 'ninte')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Here are my details.</h2>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT github, slack FROM info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Github: " . $row["github"];
        echo "<br />";
        echo "Slack: " . $row["slack"];
    }
} else {
    echo "0 results";
}

$conn->close();
?>