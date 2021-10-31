<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
            if (str_contains($route, "*")) {
                $params = explode(".", $route);
                $currentRouteParams = explode(".", Route::currentRouteName());
                if ($params[0] == $currentRouteParams[0] && $params[1] == '*') return $output;
            }
        }
    }
}

if (!function_exists("getUpload")) {
    /**
     * @param $id
     * @return string
     */
    function getUpload($el, $col = "upload_id"): string
    {
        if (is_array($el)) $id = $el[$col];
        else $id = $el;
        $upload = \App\Models\Upload::find($id);
        if (!$upload) return asset("frontend/images/placeholder.jpg");
        return asset("uploads/gallery/{$upload->file_name}");
    }
}


if (!function_exists("title")) {
    /**
     * @param string $title
     * @return string
     */
    function title($title = "")
    {
        if (isset($title) && $title != "") {
            return env("SITE_NAME", "UTI Yamaha Admin") . " | " . $title;
        } else {
            $routeArray = app('request')->route()->getAction();
            $controllerAction = class_basename($routeArray['controller']);
            list($controller, $action) = explode('@', $controllerAction);
            $controller = str_replace("Controller", "", $controller);
            return env("SITE_NAME", "UTI Yamaha Admin") . " | " . $controller;
        }
    }
}
