<?php

if(!function_exists('renderStatus')){
    function renderStatus(bool $status): string
    {
        if ($status){
            return '<span class="badge bg-success">Active</span>';
        }
        return '<span class="badge bg-warning">Inactive</span>';
    }
}
