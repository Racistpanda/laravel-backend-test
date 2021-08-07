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


namespace App\Service\Parse\Data\Result;

use App\Models\ParseData;
use App\Models\ParseDataResult;

class Creator
{
    public function create(ParseData $parseData, string $result): ParseDataResult
    {
        $parseDataResult = new ParseDataResult();
        $parseDataResult->result = $result;
        $parseDataResult->parse_data_id = $parseData->id;

        $parseDataResult->save();

        return $parseDataResult;
    }
}
