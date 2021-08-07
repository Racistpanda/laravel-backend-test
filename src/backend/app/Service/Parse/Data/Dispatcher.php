<?php


namespace App\Service\Parse\Data;


use App\Jobs\ProcessParseData;
use App\Models\Parse;

class Dispatcher
{
    public function dispatchFromParse(Parse $parse): void
    {
        foreach ($parse->parseData as $parseData) {
            ProcessParseData::dispatch($parseData);
        }
    }
}
