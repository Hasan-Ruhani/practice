<?php

    namespace App\Http\Middleware;

    use App\Helper\JWTToken;
    use Closure;
    use Illuminate\Http\Request;
    use Symfony\Component\HttpFoundation\Response;

    class TokenAuthenticate{
        public function handle(Request $request, Closure $next): Response {
            $token = $request -> cookie('token');         // token get from cookie
            $result = JWTToken::ReadToken($token);        // token read with jwt method

            if($request == "unauthorized"){
                return redirect("/userLogin");
            }
            else{
                $request -> headers -> set('email', $result -> userEmail);
                $request -> headers -> set('id', $result -> userID);
                return $next($request);
            }
        }
    }