<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityLangResourse;
use App\Models\CityLang;
use Illuminate\Http\Request;

class CityLangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CityLangResourse
     */
    public function store(Request $request)
    {
        $cityLang = new CityLang();
        $cityLang->title = $request->title;
        $cityLang->lang = $request->lang;
        $cityLang->city_id = $request->city_id;

        if ($cityLang->save()) {
            return new CityLangResourse($cityLang);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return CityLangResourse
     */
    public function show($id)
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return CityLangResourse
     */
    public function update(Request $request, $id)
    {
        $cityLang = CityLang::findOrFail($id);
        $cityLang->title = $request->title;
        $cityLang->lang = $request->lang;
        $cityLang->city_id = $request->city_id;

        if ($cityLang->save()) {
            return new CityLangResourse($cityLang);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return CityLangResourse
     */
    public function destroy($id)
    {
        $cityLang = CityLang::findOrFail($id);

        if ($cityLang->delete()) {
            return new CityLangResourse($cityLang);
        }
    }
}
