<?php
header("Content-Type: application/json");

// Read JSON File
$json = file_get_contents("parcel.json");
$data = json_decode($json, true);

if (isset($_GET['userId']) && isset($_GET['parcelId'])) {
    $userId = $_GET['userId'];
    $parcelId = $_GET['parcelId'];
    $found = false;

    foreach ($data as $parcel) {
        if ($parcel["user_id"] == $userId && $parcel["parcel_id"] == $parcelId) {
            echo json_encode([
                "user_id" => $userId,
                "parcel_id" => $parcelId,
                "status" => $parcel["status"]
            ]);
            $found = true;
            break;
        }
    }
    if (!$found) {
        echo json_encode(["message" => "Parcel Not Found"]);
    }
} else {
    echo json_encode(["message" => "Please provide userId and parcelId"]);
}
?>
