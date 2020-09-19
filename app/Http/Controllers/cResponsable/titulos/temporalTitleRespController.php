<?php

namespace App\Http\Controllers\cResponsable\titulos;

use App\Http\Controllers\Controller;
use App\temporalTitle;
use Illuminate\Http\Request;

class temporalTitleRespController extends Controller
{
    //this controller is for the user responsable
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alltitle = temporalTitle::paginate(5);

        return view('vResponsable.opWithTitles.listTitles',[
            'sizeTempTitles' =>  temporalTitle::SizeOfTemporalTitles(),
            'allTitle' => $alltitle,
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
     * @param  \App\temporalTitle  $temporalTitle
     * @return \Illuminate\Http\Response
     */
    public function show(temporalTitle $temporalTitle, $id)
    {
        //
        $dataT = $temporalTitle::find($id);

        return view('vResponsable.opWithTitles.showTitleTemporal',[
            'sizeTempTitles' =>  temporalTitle::SizeOfTemporalTitles(),
            'dataT' => $dataT,
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\temporalTitle  $temporalTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(temporalTitle $temporalTitle, $id)
    {
        //
        $dataE = $temporalTitle::find($id);
        return view('vResponsable.opWithTitles.editTitleTemporal',[
            'sizeTempTitles' =>  temporalTitle::SizeOfTemporalTitles(),
            'dataE' => $dataE,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\temporalTitle  $temporalTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, temporalTitle $temporalTitle, $id)
    {
        //
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\temporalTitle  $temporalTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(temporalTitle $temporalTitle, $id)
    {
        //
        //dd($id);
        $delData = $temporalTitle::find($id);
        $delData->delete();

        return redirect()->route('check-titles.index')->with('success','El titulo ha sido eliminado de forma correcta.');
    }
}
