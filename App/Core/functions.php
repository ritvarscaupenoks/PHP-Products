<?php

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] == $value;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path("App/Views/" . $path);
}
function redirect()
{
    return header("Location: /");
}
