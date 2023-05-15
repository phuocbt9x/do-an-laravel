<?php

use Illuminate\Support\Carbon;

if(!function_exists('renderStatus')){
    function renderStatus(bool $status): string
    {
        if ($status){
            return '<span class="badge bg-success">Active</span>';
        }
        return '<span class="badge bg-warning">Inactive</span>';
    }
}

if(!function_exists('formatDateTime')){
    function formatDateTime($dateTime, $format = 'd-m-Y H:i'): string|null
    {
        if ($dateTime){
            $carbonDate = Carbon::createFromFormat('Y-m-d H:i:s', $dateTime);
            return$carbonDate->format($format);
        }
        return null;
    }
}
