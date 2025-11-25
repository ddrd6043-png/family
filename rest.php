<?php
header("Content-Type: application/json");

// GET number
$num = $_GET['num'] ?? "";
if ($num == "") {
    echo json_encode(["error" => "Number required"]);
    exit;
}

// Remote API URL
$url = "https://encore.toxictanji0503.workers.dev/xyznumberapi?num=" . urlencode($num);

// Fetch API
$response = file_get_contents($url);
if (!$response) {
    echo json_encode(["error" => "API not responding"]);
    exit;
}

// Convert to array
$data = json_decode($response, true);

// Remove footer if exists
if (isset($data['footer'])) {
    unset($data['footer']);
}

// Output
echo json_encode($data, JSON_PRETTY_PRINT);

?>
