<?php
/**
 * TerraCore API Example — ZIP Code Lookup
 *
 * Usage:
 * TERRACORE_API_KEY=your_api_key php zipcode.php
 */

$apiKey = getenv("TERRACORE_API_KEY");

if (!$apiKey) {
    fwrite(STDERR, "Error: TERRACORE_API_KEY environment variable not set.\n");
    exit(1);
}

$url = "https://api.airelit.com/v1/terracore/zipcode";

$payload = [
    "zipcode" => "91390",
    "fields" => ["summary", "income"]
];

$ch = curl_init($url);

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "X-API-Key: $apiKey",
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_TIMEOUT => 5
]);

$response = curl_exec($ch);

if ($response === false) {
    fwrite(STDERR, "Curl error: " . curl_error($ch) . "\n");
    curl_close($ch);
    exit(1);
}

$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($status !== 200) {
    fwrite(STDERR, "Request failed: HTTP $status\n");
    fwrite(STDERR, $response . "\n");
    exit(1);
}

echo json_encode(json_decode($response, true), JSON_PRETTY_PRINT) . "\n";
