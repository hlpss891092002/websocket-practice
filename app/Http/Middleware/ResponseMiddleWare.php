<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response =  $next($request);

        $content = $response->getContent();

        json_decode($content);
        if (json_last_error() == JSON_ERROR_NONE) {
            return $response;
        }
        
        // Convert content to JSON
        $jsonContent = json_encode(['data' => $content]);
        
        // Set new content and headers
        $response->setContent($jsonContent);
        $response->header('Content-Type', 'application/json');
        
        return $response;
    }
}
