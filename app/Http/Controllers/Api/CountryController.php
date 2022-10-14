<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResourse;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CountryController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/countries",
     *      operationId="getCountries",
     *      tags={"countries"},
     *      summary="List of countries",
     *      description="Get list of countries",
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *     ),
     *     @OA\Response(response=400, description="Something is wrong")
     * )
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $countries = Country::paginate(10);
        return CountryResourse::collection($countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/api/country",
     *      operationId="createCountry",
     *      tags={"countries"},
     *      summary="Create country",
     *      description="Create country",
     *     @OA\RequestBody(
     *        required=true,
     *        description="Data",
     *          @OA\JsonContent(
     *              required={"title"},
     *              @OA\Property(property="title", type="string", example="Kazakhstan"),
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *     ),
     *     @OA\Response(response=400, description="Something is wrong")
     * )
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return CountryResourse
     */
    public function store(Request $request): CountryResourse
    {
        $country = new Country();
        $country->title = $request->title;
        $country->save();

        return new CountryResourse($country);
    }

    /**
     * @OA\Get(
     *      path="/api/country/{id}",
     *      operationId="getCountry",
     *      tags={"countries"},
     *      summary="Get country",
     *      description="Get country",
     *     @OA\Parameter(
     *          description="country ID",
     *          in="path",
     *          name="id",
     *          required=true,
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *     ),
     *     @OA\Response(response=400, description="Something is wrong")
     * )
     * Display the specified resource.
     *
     * @param int $id
     * @return CountryResourse
     */
    public function show(int $id): CountryResourse
    {
        $country = Country::findOrFail($id);
        return new CountryResourse($country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * @OA\Put(
     *      path="/api/country/{id}",
     *      operationId="updateCountry",
     *      tags={"countries"},
     *      summary="Update country",
     *      description="Update country",
     *     @OA\Parameter(
     *          description="country ID",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *     @OA\RequestBody(
     *        required=true,
     *        description="Data",
     *        @OA\JsonContent(
     *            required={"title"},
     *            @OA\Property(property="title", type="string"),
     *        ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *     ),
     *     @OA\Response(response=400, description="Something is wrong")
     * )
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return CountryResourse
     */
    public function update(Request $request, int $id): CountryResourse
    {
        $country = Country::findOrFail($id);
        $country->title = $request->title;
        $country->save();

        return new CountryResourse($country);
    }

    /**
     * @OA\Delete(
     *      path="/api/country/{id}",
     *      operationId="deleteCountry",
     *      tags={"countries"},
     *      summary="Delete country",
     *      description="Delete country",
     *     @OA\Parameter(
     *          description="country ID",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *     ),
     *     @OA\Response(response=400, description="Something is wrong")
     * )
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return CountryResourse
     */
    public function destroy(int $id): CountryResourse
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return new CountryResourse($country);
    }
}
