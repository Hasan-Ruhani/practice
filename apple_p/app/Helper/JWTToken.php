<?php

    namespace App\Helper;

use Firebase\JWT\JWT;

    class JWTToken{
        public static function CreateToken($UserEmail, $userID): string {    // email and id for the identity about user
            $key = env('JWT_KEY');

            $payload = [
                'iss'       => 'laravel-token',   // token issue name
                'iat'       => time(),            // token create time
                'exp'       => time() + 60 * 60,  // token expiration time
                'userEmail' => $UserEmail,        // current user email
                'userID'    => $userID            // current user id
            ];
            return JWT::encode($payload, $key, 'HS256');
        }
    }
