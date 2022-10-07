<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryLangResourse;
use App\Models\CountryLang;
use Illuminate\Http\Request;

class CountryLangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CountryLangResourse
     */
    public function store(Request $request)
    {
        $countryLang = new CountryLang();
        $countryLang->title = $request->title;
        $countryLang->lang = $request->lang;
        $countryLang->country_id = $request->country_id;

        if ($countryLang->save()) {
            return new CountryLangResourse($countryLang);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return CountryLangResourse
     */
    public function show($id)
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return CountryLangResourse
     */
    public function update(Request $request, $id)
    {
        $countryLang = CountryLang::findOrFail($id);
        $countryLang->title = $request->title;
        $countryLang->lang = $request->lang;
        $countryLang->country_id = $request->country_id;

        if ($countryLang->save()) {
            return new CountryLangResourse($countryLang);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return CountryLangResourse
     */
    public function destroy($id)
    {
        $countryLang = CountryLang::findOrFail($id);

        if ($countryLang->delete()) {
            return new CountryLangResourse($countryLang);
        }
    }
}
