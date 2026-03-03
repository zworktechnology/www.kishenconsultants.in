<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    // $projectType = $_POST["projectType"];
    // $services = $_POST["services"];
    $message = $_POST["message"];


    // Format the WhatsApp message template
    $data = urlencode("Hi M/s Kishen Structural Consultants - Admin\n\nNew contact has submitted with the following information:\n\nName: $name\nEmail: $email\nMobile: $mobile\nMessage : $message\n\nGood luck!");

    // API URL
    $apiUrl = "https://uae.wapionline.com/api/send?number=919843880757&type=text&message=$data&instance_id=6971B9638A805&access_token=6970cb6901b63";   

    // Send request
    $response = file_get_contents($apiUrl);

    if ($response) {
        header("Location: redirect.php");
        exit();
    } else {
        echo json_encode(["success" => false, "message" => "Failed to send message"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
}