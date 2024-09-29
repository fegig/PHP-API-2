<?php
declare(strict_types=1);

class SecurityCheck
{
    public static function validateRequest(): void
    {
        // Check for required headers
        $requiredHeaders = ['X-API-Key', 'User-Agent'];
        foreach ($requiredHeaders as $header) {
            if (!isset($_SERVER['HTTP_' . str_replace('-', '_', strtoupper($header))])) {
                http_response_code(400);
                exit(json_encode(['error' => "Missing required header: $header"]));
            }
        }

        // Validate API key
        $apiKey = $_SERVER['HTTP_X_API_KEY'];
        if (!self::isValidApiKey($apiKey)) {
            http_response_code(401);
            exit(json_encode(['error' => 'Invalid API key']));
        }

        // Add more security checks as needed (e.g., rate limiting, IP whitelisting)
    }

    private static function isValidApiKey(string $apiKey): bool
    {
        // Implement your API key validation logic here
        // For example, check against a database of valid keys
        $validKeys = ['your_valid_api_key_1', 'your_valid_api_key_2'];
        return in_array($apiKey, $validKeys);
    }
}