<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Resources\ParseDataResultResource;
use App\Models\Parse;
use App\Models\ParseData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ParseDataResultController extends Controller
{
    public function index(ListRequest $request, Parse $parse, ParseData $parseData): AnonymousResourceCollection
    {
        $request->validated();

        $perPage = $request->get('per_page', 20);

        return ParseDataResultResource::collection($parseData->parseDataResults()->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ParseDataCreator $parseDataCreator)
    {
        $result = $parseDataCreator->create($request);
        
        return ParseDataResultResource::create($resut);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        throw new \RuntimeException('Not implemented');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        throw new \RuntimeException('Not implemented');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        throw new \RuntimeException('Not implemented');
    }
}
