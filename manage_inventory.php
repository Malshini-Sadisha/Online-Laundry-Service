<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "inventory_manage"; // Modified the database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $detergentBottles = $_POST["Detergent_Bottles"];
    $fabricSoftner = $_POST["Fabric_Softner"];
    $stainRemoverBottles = $_POST["Stain_Remover_Bottles"];
    $bleachBottles = $_POST["Bleach_Bottles"];
    $laundryBags = $_POST["Laundry_Bags"];
    $dryerSheets = $_POST["Dryer_Sheet_Packets"];
    $lintRollers = $_POST["Lint_Rollers"];
    $ironingAccessories = $_POST["Ironing_Accessories"];
    $washingMachines = $_POST["Washing_Machines"];

    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO inventory_m(detergent_bottles, fabric_softner, stain_remover_bottles, bleach_bottles, laundry_bags, dryer_sheet_packets, lint_rollers, ironing_accessories, washing_machines) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssss",
        $detergentBottles,
        $fabricSoftner,
        $stainRemoverBottles,
        $bleachBottles,
        $laundryBags,
        $dryerSheets,
        $lintRollers,
        $ironingAccessories,
        $washingMachines
    );

    if ($stmt->execute()) {
        echo "Data stored successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
