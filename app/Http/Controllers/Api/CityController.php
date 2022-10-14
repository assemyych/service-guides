<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResourse;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CityController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/cities",
     *      operationId="getCities",
     *      tags={"cities"},
     *      summary="List of cities",
     *      description="Get list of cities",
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
        $cities = City::paginate(10);
        return CityResourse::collection($cities);
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
     *      path="/api/city",
     *      operationId="createCity",
     *      tags={"cities"},
     *      summary="Create city",
     *      description="Create city",
     *     @OA\RequestBody(
     *        required=true,
     *        description="Data",
     *          @OA\JsonContent(
     *              @OA\Property(property="title", type="string", example="Almaty"),
     *              @OA\Property(property="country_id", type="int", example="1"),
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
     * @return CityResourse
     */
    public function store(Request $request): CityResourse
    {
        $city = new City();
        $city->title = $request->title;
        $city->country_id = $request->country_id;
        $city->save();

        return new CityResourse($city);
    }

    /**
     * @OA\Get(
     *      path="/api/city/{id}",
     *      operationId="getCity",
     *      tags={"cities"},
     *      summary="Get city",
     *      description="Get city",
     *     @OA\Parameter(
     *          description="city ID",
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
     * @return CityResourse
     */
    public function show(int $id): CityResourse
    {
        $city = City::findOrFail($id);
        return new CityResourse($city);
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
     *      path="/api/city/{id}",
     *      operationId="updateCity",
     *      tags={"cities"},
     *      summary="Update city",
     *      description="Update city",
     *     @OA\Parameter(
     *          description="city ID",
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
     *            @OA\Property(property="title", type="string"),
     *            @OA\Property(property="country_id", type="int"),
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
     * @return CityResourse
     */
    public function update(Request $request, int $id): CityResourse
    {
        $city = City::findOrFail($id);
        $city->title = $request->title;
        $city->country_id = $request->country_id;
        $city->save();

        return new CityResourse($city);
    }

    /**
     * @OA\Delete(
     *      path="/api/city/{id}",
     *      operationId="deleteCity",
     *      tags={"cities"},
     *      summary="Delete city",
     *      description="Delete city",
     *     @OA\Parameter(
     *          description="city ID",
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
     * @return CityResourse
     */
    public function destroy(int $id): CityResourse
    {
        $city = City::findOrFail($id);
        $city->delete();

        return new CityResourse($city);
    }
}
