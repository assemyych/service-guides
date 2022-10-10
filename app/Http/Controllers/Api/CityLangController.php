<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityLangResourse;
use App\Models\CityLang;
use Illuminate\Http\Request;

class CityLangController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/cities-lang",
     *      operationId="getCitiesLang",
     *      tags={"city-lang"},
     *      summary="List of city lang",
     *      description="Get list of city lang",
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *     ),
     *     @OA\Response(response=400, description="Something is wrong")
     * )
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() : object
    {
        $cityLang = CityLang::paginate(10);
        return CityLangResourse::collection($cityLang);
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
     *      path="/api/city-lang",
     *      operationId="createCityLang",
     *      tags={"city-lang"},
     *      summary="Create city lang",
     *      description="Create city lang",
     *     @OA\RequestBody(
     *        required=true,
     *        description="Data",
     *          @OA\JsonContent(
     *              @OA\Property(property="title", type="string", example="english"),
     *              @OA\Property(property="lang", type="string", example="en"),
     *              @OA\Property(property="city_id", type="int", example="1"),
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
     * @param  \Illuminate\Http\Request  $request
     * @return CityLangResourse
     */
    public function store(Request $request) : object
    {
        $cityLang = new CityLang();
        $cityLang->title = $request->title;
        $cityLang->lang = $request->lang;
        $cityLang->city_id = $request->city_id;

        if ($cityLang->save()) {
            return new CityLangResourse($cityLang);
        }

        return response()->json([
            'success' => false
        ]);
    }

    /**
     * @OA\Get(
     *      path="/api/city-lang/{id}",
     *      operationId="getCityLang",
     *      tags={"city-lang"},
     *      summary="Get city lang",
     *      description="Get city lang",
     *     @OA\Parameter(
     *          description="city lang ID",
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
     * @param  int  $id
     * @return CityLangResourse
     */
    public function show(int $id) : object
    {
        $cityLang = CityLang::findOrFail($id);

        return new CityLangResourse($cityLang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * @OA\Put(
     *      path="/api/city-lang/{id}",
     *      operationId="updateCityLang",
     *      tags={"city-lang"},
     *      summary="Update city lang",
     *      description="Update city lang",
     *     @OA\Parameter(
     *          description="city lang ID",
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
     *            @OA\Property(property="lang", type="string"),
     *            @OA\Property(property="city_id", type="int"),
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return CityLangResourse
     */
    public function update(Request $request, $id) : object
    {
        $cityLang = CityLang::findOrFail($id);
        $cityLang->title = $request->title;
        $cityLang->lang = $request->lang;
        $cityLang->city_id = $request->city_id;

        if ($cityLang->save()) {
            return new CityLangResourse($cityLang);
        }

        return response()->json([
            'success' => false
        ]);
    }

    /**
     * @OA\Delete(
     *      path="/api/city-lang/{id}",
     *      operationId="deleteCityLang",
     *      tags={"city-lang"},
     *      summary="Delete city lang",
     *      description="Delete city lang",
     *     @OA\Parameter(
     *          description="city lang ID",
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
     * @param  int  $id
     * @return CityLangResourse
     */
    public function destroy(int $id) : object
    {
        $cityLang = CityLang::findOrFail($id);

        if ($cityLang->delete()) {
            return new CityLangResourse($cityLang);
        }

        return response()->json([
            'success' => false
        ]);
    }
}
