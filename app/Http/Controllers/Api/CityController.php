<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResourse;
use App\Models\Cities;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $cities = Cities::paginate(10);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CityResourse
     */
    public function store(Request $request)
    {
        $city = new Cities();
        $city->title = $request->title;
        $city->country_id = $request->country_id;

        if ($city->save()) {
            return new CityResourse($city);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return CityResourse
     */
    public function show($id)
    {
        $city = Cities::findOrFail($id);
        return new CityResourse($city);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return CityResourse
     */
    public function update(Request $request, $id)
    {
        $city = Cities::findOrFail($id);
        $city->title = $request->title;
        $city->country_id = $request->country_id;

        if ($city->save()) {
            return new CityResourse($city);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return CityResourse
     */
    public function destroy($id)
    {
        $city = Cities::findOrFail($id);

        if ($city->delete()) {
            return new CityResourse($city);
        }
    }
}
