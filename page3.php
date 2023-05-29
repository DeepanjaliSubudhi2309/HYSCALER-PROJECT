<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create the "uploads" directory if it doesn't exist
    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Store the uploaded files
    $file1 = $targetDir . basename($_FILES["file1"]["name"]);
    $file2 = $targetDir . basename($_FILES["file2"]["name"]);
    $file3 = $targetDir . basename($_FILES["file3"]["name"]);
    $file4 = $targetDir . basename($_FILES["file4"]["name"]);

    // Move the uploaded files to the target directory
    move_uploaded_file($_FILES["file1"]["tmp_name"], $file1);
    move_uploaded_file($_FILES["file2"]["tmp_name"], $file2);
    move_uploaded_file($_FILES["file3"]["tmp_name"], $file3);
    move_uploaded_file($_FILES["file4"]["tmp_name"], $file4);

    // Store the file paths in variables
    $file1Path = $file1;
    $file2Path = $file2;
    $file3Path = $file3;
    $file4Path = $file4;

    // Store the data in the database (you need to replace the database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create the table if it doesn't exist
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS page3 (
        id INT AUTO_INCREMENT PRIMARY KEY,
        file1Path VARCHAR(255) NOT NULL,
        file2Path VARCHAR(255) NOT NULL,
        file3Path VARCHAR(255) NOT NULL,
        file4Path VARCHAR(255) NOT NULL
    )";
    $conn->query($sqlCreateTable);

    // Insert the data into the table
    $sql = "INSERT INTO page3 (file1Path, file2Path, file3Path, file4Path) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $file1Path, $file2Path, $file3Path, $file4Path);

    if ($stmt->execute()) {
        // Redirect to the thank you page
        header("Location: thankyou.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
