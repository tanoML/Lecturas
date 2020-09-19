<?php

namespace App\Http\Controllers\cResponsable\titulos;

use App\Http\Controllers\Controller;
use App\acceptedTitle;
use App\temporalTitle;
use Illuminate\Http\Request;

class acceptedTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('vResponsable.opWithTitles.acceptListTitle',[
            'sizeTempTitles' =>  temporalTitle::SizeOfTemporalTitles(),
        ]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\acceptedTitle  $acceptedTitle
     * @return \Illuminate\Http\Response
     */
    public function show(acceptedTitle $acceptedTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\acceptedTitle  $acceptedTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(acceptedTitle $acceptedTitle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\acceptedTitle  $acceptedTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, acceptedTitle $acceptedTitle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\acceptedTitle  $acceptedTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(acceptedTitle $acceptedTitle)
    {
        //
    }
}
