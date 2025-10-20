<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function create_jwt($data)
{
    $key = getenv('JWT_SECRET');
    $issuedAt = time();
    $expire = $issuedAt + 3600; // 1 jam

    $payload = [
        'iat' => $issuedAt,
        'exp' => $expire,
        'data' => $data
    ];

    return JWT::encode($payload, $key, 'HS256');
}

function verify_jwt($token)
{
    try {
        $key = getenv('JWT_SECRET');
        return JWT::decode($token, new Key($key, 'HS256'));
    } catch (Exception $e) {
        return false;
    }
}
