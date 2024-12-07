<?php
// Klucz serwera
$key = 'secret-key';

// Funkcja do generowania podpisu HMAC-SHA256
function generateSignature($header, $payload, $key) {
    $data = base64_encode(json_encode($header)) . '.' . base64_encode(json_encode($payload));
    return hash_hmac('sha256', $data, $key);
}

// Generowanie JWT
$header = ['alg' => 'HS256', 'typ' => 'JWT'];
$payload = [
    'user_id' => 1,
    'role' => 'admin',
    'exp' => time() + 3600 // Token ważny przez 1 godzinę
];

$signature = generateSignature($header, $payload, $key);
$jwt = base64_encode(json_encode($header)) . '.' . base64_encode(json_encode($payload)) . '.' . $signature;

echo "<h1>JWT Demonstracja</h1>";
echo "<p>Wygenerowany token JWT:</p>";
echo "<pre>{$jwt}</pre>";

// Obsługa chronionego zasobu
if ($_SERVER['REQUEST_URI'] === '/protected.php') {
    $headers = getallheaders();
    $authHeader = $headers['Authorization'] ?? '';

    if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
        http_response_code(401);
        echo "<p>Unauthorized. Token required.</p>";
        exit;
    }

    $token = str_replace('Bearer ', '', $authHeader);
    list($headerEncoded, $payloadEncoded, $signatureProvided) = explode('.', $token);

    // Weryfikacja podpisu
    $headerDecoded = json_decode(base64_decode($headerEncoded), true);
    $payloadDecoded = json_decode(base64_decode($payloadEncoded), true);
    $signatureExpected = generateSignature($headerDecoded, $payloadDecoded, $key);

    if ($signatureProvided !== $signatureExpected) {
        http_response_code(401);
        echo "<p>Invalid token signature.</p>";
        exit;
    }

    // Sprawdzenie ważności tokenu
    if ($payloadDecoded['exp'] < time()) {
        http_response_code(401);
        echo "<p>Token expired.</p>";
        exit;
    }

    echo "<p>Access granted. User ID: {$payloadDecoded['user_id']}, Role: {$payloadDecoded['role']}</p>";
}
?>
