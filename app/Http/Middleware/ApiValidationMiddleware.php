<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiValidationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($response->exception instanceof ValidationException) {
            throw new HttpResponseException(response()->json(['status' => 0, 'message' => 'Something went wrong!', 'errors' => $response->exception->errors()], 200));
        }

        return $response;
    }
}
