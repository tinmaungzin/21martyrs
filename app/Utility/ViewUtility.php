<?php


namespace App\Utility;


use Carbon\Carbon;
use DateTimeZone;

class ViewUtility
{
    public static function displayNullableText($value, $null_text = null)
    {
        $null_display_text = $null_text ?? __('home.unknown');
        if (is_null($value)) {
            return $null_display_text;
        }
        return StringUtility::isEmpty($value) ? $null_display_text : $value;
    }

    public static function displayDate($date, $format = 'l jS F Y'): string
    {
        $carbon = new Carbon($date, new DateTimeZone('Asia/Yangon'));
        return $carbon->format($format);
    }
}
