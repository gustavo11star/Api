<?php
// app/Http/Middleware/Cors.php
// It's possible to generate the file with artisan (see comment)
namespace App\Http\Middleware;
use Closure;
class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request)
        // For security, you should probably specify a URL:
        // e.g. ->header('Access-Control-Allow-Origin', 'http://localhost:8080')
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Headers', 'X-PINGOTHER, Content-Type, Authorization, Content-Length, X-Requested-With')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');
    }
}