<?php

use App\Models\Language;
use Illuminate\Support\Facades\Route;


function active_class($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function active_class_r($name, array $url_inputs = [])
{
    if (is_string($name)) {
        $names = [$name];
    } elseif (is_array($name)) {
        $names = $name;
    } else {
        return '';
    }

    $current_route = Route::currentRouteName();
    $found = in_array($current_route, $names);

    if ($found and empty($url_inputs)) {
        return 'active';
    } elseif ($found and !empty($url_inputs)) {
        $all_inputs_in_url = request()->all();
        $containsSearch = count(array_intersect($url_inputs, $all_inputs_in_url)) == count($url_inputs);
        if ($containsSearch) {
            return 'active';
        }

    }
    return '';
}


function is_active_route($path)
{
    return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path)
{
    return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}

function get_default_lang()
{
    return app()->getLocale();
}

function get_languages()
{
    return Language::query()->where('active', '=', 'yes')->get();
}

function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    return $path;
}


function uploadVideo($folder, $video)
{
    $video->store('/', $folder);
    $filename = $video->hashName();
    $path = 'video/' . $folder . '/' . $filename;
    return $path;
}
