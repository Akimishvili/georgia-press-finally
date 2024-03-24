<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\Section;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ShareData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sections = Section::all();
        $categories = Category::all();
        View::share(['categories' => $categories, 'routeName' => Route::currentRouteName(),'sections' => $sections]);
        return $next($request);
    }
}
