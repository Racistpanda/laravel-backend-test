<?php


namespace App\Service\Parse;

use App\Http\Requests\ParseStoreRequest;
use App\Models\Parse;
use App\Service\Parse\Data\Creator as DataCreator;

class Creator
{
    private DataCreator $dataCreator;

    public function __construct(DataCreator $dataCreator)
    {
        $this->dataCreator = $dataCreator;
    }

    public function create(ParseStoreRequest $request): Parse
    {
        $requestData = $request->all();
        $parse = Parse::create(['tag' => $requestData['tag']]);
        $parse->save();

        $this->dataCreator->create($parse, $request);

        return $parse;
    }
}
