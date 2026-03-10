<?php
/**
 * TerraCore API Example — Address Lookup
 *
 * Usage:
 * TERRACORE_API_KEY=your_api_key php address.php
 */

$apiKey = getenv("TERRACORE_API_KEY");

if (!$apiKey) {
    fwrite(STDERR, "Error: TERRACORE_API_KEY environment variable not set.\n");
    fwrite(STDERR, "Example:\n");
    fwrite(STDERR, "TERRACORE_API_KEY=your_key php address.php\n");
    exit(1);
}

$url = "https://api.airelit.com/v1/terracore/address";

$payload = [
    "address" => "10700 Escondido Canyon Rd, Agua Dulce, CA 91390",
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

$data = json_decode($response, true);

echo "TerraCore Address Lookup Result:\n\n";
echo json_encode($data, JSON_PRETTY_PRINT) . "\n";
