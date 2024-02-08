<?php

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Support\Responsable;


function getUuid()
{
    return bin2hex(random_bytes(5));
}

function getUserInitials(string $fullName)
{
    $words = explode(' ', $fullName);

    if (count($words) > 1) {
        return strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
    }

    return strtoupper(substr($words[0], 0, 1));
}

function addEllipsis($text, $max = 35)
{
    return strlen($text) > $max ? mb_substr($text, 0, $max, 'UTF-8') . '...' : $text;
}

function canEmpty($value)
{
    return empty($value) ? '<small><i>Unavailable</i></small>' : $value;
}

function humanTime($time)
{
    return \Carbon\Carbon::parse($time)->diffForHumans();
}

function getFirstDay($format = 'm/d/Y')
{
    return \Carbon\Carbon::now()->startOfMonth()->format($format);
}

function getLastDay($format = 'm/d/Y')
{
    return \Carbon\Carbon::now()->endOfMonth()->format($format);
}

function getRandomColorClass()
{
    $classes = ['bg-warning', 'bg-info', 'bg-danger', 'bg-blue', 'bg-pink', 'bg-indigo', 'bg-secondary', 'bg-purple'];
    return $classes[mt_rand(0, count($classes) - 1)];
}

function replaceUnderscores($string)
{
    return ucwords(str_replace('_', ' ', $string));
}

function pathToUrl($path)
{
    if (empty($path) || $path == '/') return null;
    if (strpos($path, 'http') !== false) return $path;
    if (strpos($path, 'examples') !== false) return url($path);

    return url('storage/' . $path);
}

function getAvatarHtml($user = null)
{
    $user = !empty($user) ? $user : auth()->user();

    if (
        !empty($user->avatar)
        && Illuminate\Support\Facades\Storage::disk('public')->exists($user->avatar)
    ) {
        return '
            <span style="display: none;">' . getUserInitials($user->name) . '</span>
            <img src="' . pathToUrl('thumbnails/' . $user->avatar) . '" alt="avatar">
        ';
    }
    
    return '
        <span>' . getUserInitials($user->name) . '</span>
        <img src="" alt="avatar" style="display: none;">
    ';
}

function optionalJsonDecode($data)
{
    return isJson($data) ? json_decode($data) : $data;
}

function isJson($string)
{
    if (!is_string($string)) return false;

    json_decode($string);

    return empty(json_last_error_msg()) || json_last_error_msg() == 'No error';
}
