<?php

namespace App\Http\Controllers\cEmployee\titulos;

use App\Http\Controllers\Controller;
use App\temporalTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class temporalTitleDocController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','employee','status:A']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('vDocente.opWithTitles.listTitle');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vDocente.opWithTitles.formTitle');
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
        DB::transaction( function() use ($request) {
            $newTitle = new temporalTitle();
            $newTitle->name = $request->name;
            $newTitle->author = $request->author;
            $newTitle->nroPage = $request->numPag;
            $newTitle->library = ($request->library == 'on' ? 1 : 0);
            $newTitle->id_user = auth()->user()->id;
    
            $newTitle->save();
        });

        return redirect()->route('temporalTitlesDoc.index')->with('success','Muchas gracias el titulo ha sido enviado.');
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
