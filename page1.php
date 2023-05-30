<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store the data in variables
    $name = $_POST['name'];
    $dob = date("Y/m/d", strtotime($_POST['dob'])); // Convert date to the desired format
    $email = $_POST['email'];
    $fathername = $_POST['fathername'];
    $mothername = $_POST['mothername'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $countrycode = $_POST['countrycode'];
    $telemob = $_POST['telemob'];

    // Store the data in the database (you need to replace the database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO page1 (name, dob, email, fathername, mothername, gender, nationality, address, pincode, city, country, countrycode, telemob) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssss", $name, $dob, $email, $fathername, $mothername, $gender, $nationality, $address, $pincode, $city, $country, $countrycode, $telemob);

    if ($stmt->execute()) {
        // Redirect to page 2
        header("Location: page2.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
