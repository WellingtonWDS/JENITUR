<?php
Namespace App;


use Carbon\Carbon;

class Format {

    private $date;
    private $hour;

    public function formatDate($date)
    {
        $this->date = Carbon::parse($date)->format('d/m/Y');
        return $this->date;

    }

    public function formatHour($hour)
    {
        $this->hour = Carbon::parse($hour)->format('h:i');
        return $this->hour;
    }

}