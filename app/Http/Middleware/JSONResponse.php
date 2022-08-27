<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse as HttpJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;

//https://stackoverflow.com/questions/36366727/how-do-you-force-a-json-response-on-every-response-in-laravel

class JSONResponse
{
    protected $responseFactory;

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');
        
        $response = $next($request);

        if (!$response instanceof HttpJsonResponse) {
            $response = $this->responseFactory->json(
                $response->content(),
                $response->status(),
                $response->headers->all()
            );
        }

        return $response;
    }
}
