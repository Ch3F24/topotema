<?php

namespace App\Traits;

use Carbon\Carbon;

trait HasDate
{
    public function getDate($date_from, $date_to)
    {
        $from = Carbon::parse($date_from);
        $to = Carbon::parse($date_to);

        if ($from->eq($to)) {
            return $to->format('Y-m-d');
        }

        if ($from->month === $to->month) {
            return $to->format('Y-m');
        };

        return $from->year;
    }

}
