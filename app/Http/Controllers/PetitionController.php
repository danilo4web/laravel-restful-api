<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetitionCollection;
use App\Http\Resources\PetitionResource;
use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class PetitionController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(
            new PetitionCollection(Petition::all()),
            Response::HTTP_OK
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\PetitionResource
     */
    public function store(Request $request)
    {
        $petition = Petition::create(
            $request->only(
                [
                    'title',
                    'description',
                    'category',
                    'author',
                    'signees'
                ]
            )
        );

        return response()->json(
            new PetitionResource($petition),
            Response::HTTP_CREATED
        );
    }

    /**
     * @param \App\Models\Petition $petition
     * @return \App\Http\Resources\PetitionResource
     */
    public function show(Petition $petition)
    {
        return response()->json(
            new PetitionResource($petition),
            Response::HTTP_OK
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Petition     $petition
     * @return \App\Http\Resources\PetitionResource
     */
    public function update(Request $request, Petition $petition)
    {
        $petition->update(
            $request->only(
                [
                    'title',
                    'description',
                    'category',
                    'author',
                    'signees'
                ]
            )
        );

        return response()->json(
            new PetitionResource($petition),
            Response::HTTP_ACCEPTED
        );
    }

    /**
     * @param \App\Models\Petition $petition
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Petition $petition)
    {
        $petition->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
