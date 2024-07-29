<?php

// app/Http/Middleware/LogResponseStatusCode.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogResponseStatusCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Handle the request and get the response
        $response = $next($request);

        // Log the status code
        \Log::info('Response Status Code: ' . $response->status());
        // dd($response->status());

        // Optionally, you can do something with the status code here
        // For example, you can add a custom header
        // $response->header('X-Status-Code', $response->status());

        return $response;
        
    }
}