<?php


namespace App\Service\Parse\Data;


use App\Http\Requests\ParseStoreRequest;
use App\Models\Parse;

class Creator
{
    private Dispatcher $dispatcher;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function create(Parse $parse, ParseStoreRequest $request): void
    {
        $requestData = $request->all();

        $parse->parseData()->createMany($requestData['data']);

        $this->dispatcher->dispatchFromParse($parse);
    }
}
