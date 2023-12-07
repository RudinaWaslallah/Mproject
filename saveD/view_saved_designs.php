<h2>Previous Designs</h2>

    <?php
    // Update the database connection credentials accordingly
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "sdesigns";

    
// Establish database connection
$conn = new mysqli('localhost', 'root', 'root', 'sdesigns');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


    // Retrieve previous designs from the database
    $result = $conn->query("SELECT * FROM designs");
    if ($result->num_rows > 0) {
        echo "<table>"; // Opening table tag
        echo "<tr><th>ID</th><th>Logo URL</th><th>T-shirt Image URL</th><th>Logo Size</th><th>Text Content</th><th>Text Color</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>"; 
            echo "<td>" . $row["logo_url"] . "</td>";
            echo "<td>" . $row["tshirt_image_url"] . "</td>";
            echo "<td>" . $row["logo_size"] . "</td>";
            echo "<td>" . $row["text_content"] . "</td>";
            echo "<td>" . $row["text_color"] . "</td>";
            echo "</tr>";
        }
        echo "</table>"; // Closing table tag
    } else {
        echo "No previous designs found.";
    }

    // Close the database connection
    $conn->close();
    ?>

