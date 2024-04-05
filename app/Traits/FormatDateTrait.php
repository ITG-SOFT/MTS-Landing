<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait FormatDateTrait
{
    private function formatDate($date, $format)
    {
        return Carbon::parse($date)->translatedFormat($format);
    }
}
