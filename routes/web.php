<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $routes = collect(app('router')->getRoutes())
        ->filter(fn($route) => str_starts_with($route->uri(), 'api/'))
        ->map(function ($route) {
            return [
                'uri' => $route->uri(),
                'methods' => array_values(array_diff($route->methods(), ['HEAD'])),
                'name' => $route->getName(),
            ];
        })
        ->groupBy('uri')
        ->map(function ($group) {
            return [
                'uri' => $group->first()['uri'],
                'methods' => $group->pluck('methods')->flatten()->unique()->values(),
            ];
        })
        ->values();

    return response()->json(
        $routes,
        200,
        [],
        JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
    );
});

Route::get('/openapi.yaml', function () {
    $path = storage_path('app/private/scribe/openapi.yaml');

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path, [
        'Content-Type' => 'text/yaml',
    ]);
});

Route::view("/swagger", "swagger");
