<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

if (!function_exists('money')) {
    function money($number)
    {
        return number_format($number, 2, ",", ".");
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}

if (!function_exists('getData')) {
    function getData()
    {
        return now('America/Sao_Paulo');
    }
}
if (!function_exists('getResponse')) {
    function getResponse($url,$token)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer' . $token,
        ])->get($url);

        return $response;
    }
}

if (!function_exists('putResponse')) {
    function putResponse($url,$token,$dados)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer' . $token,
        ])->put($url,$dados);

        return $response;
    }
}

if (!function_exists('hora')) {
    function hora($string)
    {
        return date('H:i', strtotime($string)) . "h";
    }
}

if (!function_exists('removeSpecialChars')) {
    function removeSpecialChars($string)
    {
        return preg_replace("/\D+/", "", $string);
    }
}