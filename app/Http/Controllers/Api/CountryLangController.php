<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryLangResourse;
use App\Models\CountryLang;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CountryLangController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/countries-lang",
     *      operationId="getCountriesLang",
     *      tags={"country-lang"},
     *      summary="List of country lang",
     *      description="Get list of countries lang",
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
    public function index() : AnonymousResourceCollection
    {
        $countryLang = CountryLang::paginate(10);
        return CountryLangResourse::collection($countryLang);
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
     *      path="/api/country-lang",
     *      operationId="createCountryLang",
     *      tags={"country-lang"},
     *      summary="Create country lang",
     *      description="Create country lang",
     *     @OA\RequestBody(
     *        required=true,
     *        description="Data",
     *          @OA\JsonContent(
     *              @OA\Property(property="title", type="string", example="english"),
     *              @OA\Property(property="lang", type="string", example="en"),
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
     * @param  \Illuminate\Http\Request  $request
     * @return CountryLangResourse
     */
    public function store(Request $request) : CountryLangResourse
    {
        $countryLang = new CountryLang();
        $countryLang->title = $request->title;
        $countryLang->lang = $request->lang;
        $countryLang->country_id = $request->country_id;
        $countryLang->save();

        return new CountryLangResourse($countryLang);
    }

    /**
     * @OA\Get(
     *      path="/api/country-lang/{id}",
     *      operationId="getCountryLang",
     *      tags={"country-lang"},
     *      summary="Get country lang",
     *      description="Get country lang",
     *     @OA\Parameter(
     *          description="country lang ID",
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
     * @return CountryLangResourse
     */
    public function show(int $id) : CountryLangResourse
    {
        $countryLang = CountryLang::findOrFail($id);

        return new CountryLangResourse($countryLang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @OA\Put(
     *      path="/api/country-lang/{id}",
     *      operationId="updateCountryLang",
     *      tags={"country-lang"},
     *      summary="Update country lang",
     *      description="Update country lang",
     *     @OA\Parameter(
     *          description="country lang ID",
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return CountryLangResourse
     */
    public function update(Request $request, int $id) : object
    {
        $countryLang = CountryLang::findOrFail($id);
        $countryLang->title = $request->title;
        $countryLang->lang = $request->lang;
        $countryLang->country_id = $request->country_id;
        $countryLang->save();

        return new CountryLangResourse($countryLang);
    }

    /**
     * @OA\Delete(
     *      path="/api/country-lang/{id}",
     *      operationId="deleteCountryLang",
     *      tags={"country-lang"},
     *      summary="Delete country lang",
     *      description="Delete country lang",
     *     @OA\Parameter(
     *          description="country lang ID",
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
     * @return CountryLangResourse
     */
    public function destroy(int $id) : object
    {
        $countryLang = CountryLang::findOrFail($id);
        $countryLang->delete();

        return new CountryLangResourse($countryLang);
    }
}
