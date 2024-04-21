<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{

    //function to convert view count to K or M or B
    public static function convertViewToKM($view)
    {
        if ($view < 1000) {
            return $view;
        } elseif ($view < 1000000) {
            return round($view / 1000, 1) . 'K';
        } elseif ($view < 1000000000) {
            return round($view / 1000000, 1) . 'M';
        } else {
            return round($view / 1000000000, 1) . 'B';
        }
    }

    public static function convertLengthToHours($length)
    {
        $hours = floor($length / 60);
        $minutes = $length % 60;
        return $hours . ' hour ' . $minutes . ' minutes';
    }
}
