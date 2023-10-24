<?php


if (!function_exists("is_in_api")) {
    function is_in_api($request) {
        return $request->expectsJson() ? true : false;
    }
}