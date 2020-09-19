<?php

namespace App\Http\Controllers\cResponsable\dates;

use App\Http\Controllers\Controller;
use App\dateSetToSendReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\temporalTitle;

class dateSetToSendReportController extends Controller
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
        $tam = dateSetToSendReport::SizeOfDatesToSendReport();
        $allDateR = dateSetToSendReport::all();
        return view('vResponsable.opWithDates.setDatesReports',[
            'tam' => $tam,
            'allDate' => $allDateR,
            'sizeTempTitles' => temporalTitle::SizeOfTemp()->total_temp_titles,
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
        return view('vResponsable.opWithDates.addSetDatesReport',[
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
        //$request->dateSPP
        //$request->dateEndPP
        //$request->dateSSP
        //$request->dateEndSP
        //$request->dateSTP
        //$request->dateEndTP

        $validateData = $request->validate([
            'dateSPP' => 'required|date|after:tomorrow',
            'dateEndPP' => 'required|date|after:tomorrow',
            'dateSSP' => 'required|date|after:tomorrow',
            'dateEndSP' => 'required|date|after:tomorrow',
            'dateSTP' => 'required|date|after:tomorrow',
            'dateEndTP' => 'required|date|after:tomorrow',
        ]);

        DB::transaction(function() use ($request){
            $newDataConfRPP = new dateSetToSendReport();
            $newDataConfRPP->dateStartR = $request->dateSPP;
            $newDataConfRPP->dateEndR = $request->dateEndPP;
            $newDataConfRPP->fullDate = 0;
            $newDataConfRPP->parcial = 1;
            $newDataConfRPP->save();

            $newDataConfRSP = new dateSetToSendReport();
            $newDataConfRSP->dateStartR = $request->dateSSP;
            $newDataConfRSP->dateEndR = $request->dateEndSP;
            $newDataConfRSP->fullDate = 0;
            $newDataConfRSP->parcial = 2;
            $newDataConfRSP->save();

            
            $newDataConfRSP = new dateSetToSendReport();
            $newDataConfRSP->dateStartR = $request->dateSTP;
            $newDataConfRSP->dateEndR = $request->dateEndTP;
            $newDataConfRSP->fullDate = 0;
            $newDataConfRSP->parcial = 3;
            $newDataConfRSP->save();

        });

        return redirect()->route('datesReport.index')->with('messages','Las fechas han sido establecidas de forma correcta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dateSetToSendReport  $dateSetToSendReport
     * @return \Illuminate\Http\Response
     */
    public function show(dateSetToSendReport $dateSetToSendReport, $id)
    {
        //
        $findDateR = $dateSetToSendReport::find($id);
        return view('vResponsable.opWithDates.showSetDatesReport',[
            'findDateR' => $findDateR,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dateSetToSendReport  $dateSetToSendReport
     * @return \Illuminate\Http\Response
     */
    public function edit(dateSetToSendReport $dateSetToSendReport, $id)
    {
        //
        $timenow = Carbon::now('America/Mexico_City');
        $dateData = $dateSetToSendReport::find($id);

        return view('vResponsable.opWithDates.editDatesToSetDatesReport',[
            'timenow' => $timenow,
            'dateData' => $dateData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dateSetToSendReport  $dateSetToSendReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dateSetToSendReport $dateSetToSendReport, $id)
    {
        //this methosd update the date
        $validateDate = $request->validate([
            'dateStart' => 'required|date|after:tomorrow',
            'dateEnd' => 'required|date|after:tomorrow',
        ]);


        $dateUpdate = $dateSetToSendReport::find($id);
        $dateUpdate->dateStartR = $request->dateStart;
        $dateUpdate->dateEndR = $request->dateEnd;
        $dateUpdate->save();

        return redirect()->route('datesReport.index')->with('messages','La fecha ha sido actualizada de forma correcta.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dateSetToSendReport  $dateSetToSendReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(dateSetToSendReport $dateSetToSendReport)
    {
        //
    }
}
