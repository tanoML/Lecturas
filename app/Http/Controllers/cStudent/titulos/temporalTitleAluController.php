<?php

namespace App\Http\Controllers\cStudent\titulos;

use App\Http\Controllers\Controller;
use App\temporalTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class temporalTitleAluController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','student','status:A']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('vAlumno.opWithTitles.listTitles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vAlumno.opWithTitles.formTitle');
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
        //dd($request);
        DB::transaction(function () use ($request) {
            $newTitleA = new temporalTitle();
            $newTitleA->author = $request->authorA;
            $newTitleA->name = $request->titleA;
            $newTitleA->nroPage = $request->nPag;
            $newTitleA->library = 0;
            $newTitleA->id_user = auth()->user()->id;
            $newTitleA->save();
        });
    

        return redirect()->route('inicioStudent')->with('success','Tu titulo ha sido entregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\temporalTitle  $temporalTitle
     * @return \Illuminate\Http\Response
     */
    public function show(temporalTitle $temporalTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\temporalTitle  $temporalTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(temporalTitle $temporalTitle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\temporalTitle  $temporalTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, temporalTitle $temporalTitle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\temporalTitle  $temporalTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(temporalTitle $temporalTitle)
    {
        //
    }
}
