<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResourse;
use App\Models\Countries;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $countries = Countries::paginate(10);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CountryResourse
     */
    public function store(Request $request)
    {
        $country = new Countries();
        $country->title = $request->title;

        if ($country->save()) {
            return new CountryResourse($country);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return CountryResourse
     */
    public function show($id)
    {
        $country = Countries::findOrFail($id);
        return new CountryResourse($country);
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
     * @return CountryResourse
     */
    public function update(Request $request, $id)
    {
        $country = Countries::findOrFail($id);
        $country->title = $request->title;

        if ($country->save()) {
            return new CountryResourse($country);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return CountryResourse
     */
    public function destroy($id)
    {
        $country = Countries::findOrFail($id);

        if ($country->delete()) {
            return new CountryResourse($country);
        }
    }
}
