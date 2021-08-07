<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\ParseStoreRequest;
use App\Http\Resources\ParseResource;
use App\Models\Parse;
use App\Service\Parse\Creator;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ParseController extends Controller
{
    private Creator $parseCreator;

    public function __construct(Creator $parseCreator)
    {
        $this->parseCreator = $parseCreator;
    }

    public function index(ListRequest $request): AnonymousResourceCollection
    {
        $request->validated();
        $perPage = $request->get('per_page', 20);

        return ParseResource::collection(Parse::orderBy('id', 'desc')->paginate($perPage));
    }

    public function store(ParseStoreRequest $request): ParseResource
    {
        $request->validated();
        $parse = $this->parseCreator->create($request);

        return new ParseResource($parse);
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
