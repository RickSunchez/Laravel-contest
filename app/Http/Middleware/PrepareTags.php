<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PrepareTags
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('tags')) {
            $request->merge(array(
                'tags' => explode(",", preg_replace('/\s*,\s*/i', ',', $request->input('tags')))
            ));
        }
        
        return $next($request);
    }
}
