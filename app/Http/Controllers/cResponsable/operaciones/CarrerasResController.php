<?php

namespace App\Http\Controllers\cResponsable\operaciones;


use App\Institute;
use App\Campus;
use App\temporalTitle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarrerasResController extends Controller
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
        $idCampusOfUser = Institute::GetIdOfCampus(auth()->user()->id_institute);

        $allCarrerAvailable = DB::table('institutes')->leftjoin('responsables_carreras','institutes.id','=','responsables_carreras.id_carrera')
        ->select('institutes.carrera','institutes.id')
        ->where([
            ['responsables_carreras.id_carrera','=',NULL],
            ['institutes.id_campus',$idCampusOfUser->id_campus]
        ])->get();

        $allCarrerofResp = DB::table('responsables_carreras')->join('institutes','responsables_carreras.id_carrera','=','institutes.id')
        ->select('institutes.carrera','institutes.id')->where([
            ['id_campus',$idCampusOfUser->id_campus],
            ['id_responsable',auth()->user()->id]
        ])->get();

       

        //$allCarrer = Institute::select('id','carrera')->where('id_campus',$idCampusOfUser)->get();
       //$allCarrer = Institute::where('id_campus',$idCampusOfUser)->get(['carrera']);
       //$allCarrer=Institute::all('carrera');

       //$allCarrer = User::select('id','name')->where('role','R')->get();
       //$allCarrer = Institute::all();
       $allCarrer = Institute::GetAllCarrersById($idCampusOfUser->id_campus);
        

        return view('vResponsable.opCarrerasResp',[
            'allCarrerofResp' => $allCarrerofResp,
            'allCarrerAvailable' => $allCarrerAvailable,
            'allCarrer' => $allCarrer,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function setMyCarrers(Request $request)
    {

        $idCampusOfUser = Institute::GetIdOfCampus(auth()->user()->id_institute);
        $sizeOfCarreras = Institute::SizeOfCarrers($idCampusOfUser->id_campus);
        $values = [];
        $j=1;
        while($j <= $sizeOfCarreras )
        {
            if($request->has('carreras_'.$j))
            {
                array_push($values,$j);
            }
            $j++;
        }
            $current_date_time = date('Y-m-d H:i:s');
            for($i=0; $i < count($values); $i++){
                DB::table('responsables_carreras')->insert([ 
                    'id_responsable' => auth()->user()->id,
                    'id_carrera' => $values[$i],
                    'created_at' =>  $current_date_time,
                    'updated_at' => $current_date_time,
                    ]);
            }
            return redirect()->route('OpWithCarrers')->with('success','Carreras agregadas correctamente');

    }

    public function deleteMyCarrer(Request $request)
    {

        $deleteCarrer = DB::table('responsables_carreras')->where([
            ['id_carrera',$request->carrera],
            ['id_responsable',auth()->user()->id]
        ])->delete();
        if($deleteCarrer)
            return redirect()->route('OpWithCarrers')->with('success','Carrera eliminado correctamente');
    }

    public function addCampus(Request $request)
    {
        $newCampus  = new Campus;
        $newCampus->name = $request->campus;
        $newCampus->save();
        return redirect()->route('OpWithCarrers')->with('success','El campus se ha agregado de forma correcta.');
    }

    public function addCarrer(Request $request)
    {
        dd($request);
    }
}
