<?php

namespace App\Http\Controllers\cResponsable\dates;

use App\Http\Controllers\Controller;
use App\dateSetTitles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\temporalTitle;

class dateSetTitlesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','responsable','status:A']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allDates = dateSetTitles::all();
        $sizeTableDate = dateSetTitles::SizeOfDates();

        //dd($prueba);

        return view('vResponsable.opWithDates.setDates',[
            'allDates' => $allDates,
            'sizeTableDate' => $sizeTableDate,
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
        $timenow = Carbon::now('America/Mexico_City');
        return view('vResponsable.opWithDates.addSetDates',[
            'timenow' => $timenow->format('Y-m-d'),
        ]);
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
        $timenow = Carbon::now('America/Mexico_City')->format('Y-m-d');
        //$request->dateSPP;
        //$request->dateEndPP;
        //$request->dateSSP;
        //$request->dateEndSP;
        //$request->dateSTP;
        //$request->dateEndTP;

        $validateData = $request->validate([
            'dateSPP' => 'required|date|after:tomorrow',
            'dateEndPP' => 'required|date|after:tomorrow',
            'dateSSP' => 'required|date|after:tomorrow',
            'dateEndSP' => 'required|date|after:tomorrow',
            'dateSTP' => 'required|date|after:tomorrow',
            'dateEndTP' => 'required|date|after:tomorrow',
        ],[
            'required' => 'El atributo :attribute debe tener un valor.',
            //ESTABLECER DESPUES EL TEXTO PARA LAS VALIDACIONES
        ]);

            DB::transaction(function () use ($request){
                $newDateConfPP = new dateSetTitles();
                $newDateConfPP->dateStart = $request->dateSPP;
                $newDateConfPP->dateEnd = $request->dateEndPP;
                $newDateConfPP->fullDate = 0;
                $newDateConfPP->parcial = 1;
                $newDateConfPP->save();
    
                $newDateConfSP = new dateSetTitles();
                $newDateConfSP->dateStart = $request->dateSSP;
                $newDateConfSP->dateEnd = $request->dateEndSP;
                $newDateConfSP->fullDate = 0;
                $newDateConfSP->parcial = 2;
                $newDateConfSP->save();

                $newDateConfTP = new dateSetTitles();
                $newDateConfTP->dateStart = $request->dateSTP;
                $newDateConfTP->dateEnd = $request->dateEndTP;
                $newDateConfTP->fullDate = 0;
                $newDateConfTP->parcial = 3;
                $newDateConfTP->save();
    
               
            });

            return redirect()->route('dates.index')->with('messages','Las fechas han sido establecidas de forma correcta');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dateSetTitles  $dateSetTitles
     * @return \Illuminate\Http\Response
     */
    public function show(dateSetTitles $dateSetTitles,$id)
    {
        //
        $dateInfo = $dateSetTitles::find($id);

        return view('vResponsable.opWithDates.showSetDates',[
            'dateInfo' => $dateInfo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dateSetTitles  $dateSetTitles
     * @return \Illuminate\Http\Response
     */
    public function edit(dateSetTitles $dateSetTitles, $id)
    {
        //
        $date = $dateSetTitles::find($id);
        $timenow = Carbon::now('America/Mexico_City');

        return view('vResponsable.opWithDates.editDatesToSetDates',[
            'dateToEdit' => $date,
            'timenow' => $timenow,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dateSetTitles  $dateSetTitles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dateSetTitles $dateSetTitles, $id)
    {
        //dd($request);
        $dateToUpdate = $dateSetTitles::find($id);
        $dateToUpdate->dateStart = $request->dateStart;
        $dateToUpdate->dateEnd = $request->dateEnd;
        $dateToUpdate->save();

        return redirect()->route('dates.index')->with('messages', 'La fecha ha sidpo actualzada de forma correcta');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dateSetTitles  $dateSetTitles
     * @return \Illuminate\Http\Response
     */
    public function destroy(dateSetTitles $dateSetTitles)
    {
        //
    }
}
