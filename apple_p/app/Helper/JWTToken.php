<?php

    namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

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

        public static function ReadToken($token): string|object {    // get token from cookie
            try{
                if($token == null){
                    return 'unauthorized';          // unauthorized work to TokenAuthenticate in Middleware
                }
                else{
                    $key = env('JWT_KEY');
                    return JWT::decode($token, new Key($key, 'HS256'));
                }
            }
            catch(Exception $e){
                return 'unauthorized';
            }
            
        }
    }
