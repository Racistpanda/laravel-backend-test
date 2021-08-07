<?php
/*
* @copyright C UAB NFQ Technologies
*
* This Software is the property of NFQ Technologies
* and is protected by copyright law – it is NOT Freeware.
*
* Any unauthorized use of this software without a valid license key
* is a violation of the license agreement and will be prosecuted by
* civil and criminal law.
*
* Contact UAB NFQ Technologies:
* E-mail: info@nfq.lt
* http://www.nfq.lt
*
*/


namespace App\Service\Parse\Data;


use App\Models\ParseData;
use GuzzleHttp\Client;
use App\Service\Parse\Data\Result\Creator;

class Processor
{
    private Creator $creator;

    public function __construct(Creator $creator)
    {
        $this->creator = $creator;
    }

    public function process(ParseData $parseData): void
    {
        try {
            $document = new \DOMDocument();
            @$document->loadHTML(file_get_contents($parseData->url));

            foreach ($document->getElementsByTagName($parseData->parse->tag) as $data) {
                $this->creator->create($parseData, $data->textContent);
            }

            $parseData->finished = true;
            $parseData->save();

        } catch (\Exception $exception) {
            $parseData->error = true;
            $parseData->save();

            throw $exception;
        }
    }
}
