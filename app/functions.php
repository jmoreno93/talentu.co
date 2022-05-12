<?php

if(!function_exists('paginate'))
{
    function paginateArray($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Illuminate\Support\Collection ? $items : Illuminate\Support\Collection::make($items);
        return new Illuminate\Pagination\LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}