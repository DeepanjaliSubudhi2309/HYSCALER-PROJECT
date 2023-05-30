<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS page2new (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    hscinsti VARCHAR(255) NOT NULL,
    hscboard VARCHAR(50) NOT NULL,
    hscper DECIMAL(5,2) NOT NULL,
    hsccgpa DECIMAL(4,2) NOT NULL,
    sscinsti VARCHAR(255) NOT NULL,
    sscboard VARCHAR(50) NOT NULL,
    sscper DECIMAL(5,2) NOT NULL,
    ssccgpa DECIMAL(4,2) NOT NULL,
    current VARCHAR(255) NOT NULL,
    currentinsti VARCHAR(255) NOT NULL,
    overper DECIMAL(5,2) NOT NULL,
    overcgpa DECIMAL(4,2) NOT NULL,
    back VARCHAR(3) NOT NULL
)";

$conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $hscinsti = $_POST["hscinsti"];
    $hscboard = $_POST["hscboard"];
    $hscper = $_POST["hscper"];
    $hsccgpa = $_POST["hsccgpa"];
    $sscinsti = $_POST["sscinsti"];
    $sscboard = $_POST["sscboard"];
    $sscper = $_POST["sscper"];
    $ssccgpa = $_POST["ssccgpa"];
    $current = $_POST["current"];
    $currentinsti = $_POST["currentinsti"];
    $overper = $_POST["overper"];
    $overcgpa = $_POST["overcgpa"];
    $back = $_POST["back"];

    $stmt = $conn->prepare("INSERT INTO page2new (hscinsti, hscboard, hscper, hsccgpa, sscinsti, sscboard, sscper, ssccgpa, current, currentinsti, overper, overcgpa, back)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssddssddssdds", $hscinsti, $hscboard, $hscper, $hsccgpa, $sscinsti, $sscboard, $sscper, $ssccgpa, $current, $currentinsti, $overper, $overcgpa, $back);

    if ($stmt->execute()) {
        
        $stmt->close();
        $conn->close();
        header("Location: page3.html");
        exit;
    } else {
        
        echo "Error inserting data: " . $conn->error;
    }
}

$conn->close();
?>

