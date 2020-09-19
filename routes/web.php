<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('inicioRaiz');
Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
//ruta para pbtener las carreras de acuerdo al campus
Route::get('/carrers/{id}', function($id){
    $carrers = App\Institute::select('id','carrera')->where('id_campus',$id)->get();
    return $carrers;
});

//********************SECCION DE VISTAS PARA EL ALUMNO ********************//
//esta ruta es para obtener los datos de registro del alumno
Route::get('vPrincipal/registros/regalumno', function(App\Campus $campus){
    $allCampus = $campus::all();
    return view('vPrincipal.registros.regalumno',['allCampus' => $allCampus]);
})->name('registroAlumno');

Route::group(['middleware' => ['auth','student','verified','status:A']], function(){
    Route::get('vAlumno/welcome', 'cStudent\TstudentController@index')->name('inicioStudent');
    Route::get('vAlumno/configuracion/updateData','cStudent\TstudentController@edit')->name('updateData');
    Route::put('vAlumno/updateData','cStudent\TstudentController@update')->name('storeUpdate');
    Route::view('vAlumno/configuracion/updatePassword','vAlumno.updatePassword')->name('formToUpdatePass');
    Route::put('vAlumno/updatePassword','cStudent\TstudentController@updatePassword')->name('updatePassword');
    //routes for titles
    //this resource assign automatically the routes for index, create, edit and destroy
    Route::resource('vAlumno/titulos/temporalTitlesAlu','cStudent\titulos\temporalTitleAluController');
    //route for report
    Route::view('vAlumno/reporte/inicio','vAlumno.opWithReport.inicioReport')->name('Wreporte');
});





//*****************SECCION DE VISTAS PARA EL DOCENTE**********************//
//funcion que permite recuperar todos los campus dependiendo de la carrera
Route::get('vPrincipal/registros/regdocente',function(App\Campus $campus){
    $allCampus = $campus::all();
    return view('vPrincipal.registros.regdocente',['allCampus' => $allCampus]);
})->name('registroDocente');

Route::group(['middleware' => ['auth','employee','verified','status:A']], function(){
    Route::get('vDocente/welcome','cEmployee\Temployee@index')->name('inicioDocente');
    Route::put('vDocente/updateDataDocente','cEmployee\Temployee@update')->name('readyToUpdateDataDoc');
    Route::get('vDocente/configuracion/updateDataDocente','cEmployee\Temployee@show')->name('updateDataDoc');
    Route::put('vDocente/updatePasswordDocente','cEmployee\Temployee@updatePasswordDoc')->name('readyToUpdatePassDoc');
    Route::view('vDocente/configuracion/acercaDe','vDocente.acercaDe')->name('vistaAcercade');
    Route::view('vDocente/configuracion/updatePasswordDocente','vDocente.updatePasswordDocente')->name('updatePasswordDoc');
    //routes for titles
    Route::resource('vDocente/titulos/temporalTitlesDoc','cEmployee\titulos\temporalTitleDocController');
    //routes for citas
    Route::view('vDocente/citas/opWithCitas','vDocente.opWithCitas.viewCitas')->name('vCitas');
});





//*******************SECCION DE VISTAS PARA EL RESPOSANBLE*******************//
Route::group(['middleware' => ['auth','responsable','verified','status:A']], function(){
    Route::get('vResponsable/welcome','cResponsable\ResponsableController@index')->name('inicioResponsable');
    Route::get('vResponsable/configuracion/updateDataResponsable','cResponsable\ResponsableController@show')->name('updateDataResp');
    //this route will be comment
    //Route::get('vResponsable/nuevoResponsable','ResponsableController@getProfesor')->name('nuevoResponsable');
    Route::put('vResponsable/updateDataResponsable','cResponsable\ResponsableController@update')->name('readyToUpdateResp');
    Route::view('vResponsable/configuracion/updatePasswordResponsable','vResponsable.updatePasswordResponsable',['sizeTempTitles' => App\temporalTitle::SizeOfTemp()->total_temp_titles])->name('showFormPassResp');
    Route::put('vResponsable/updatePasswordResponsable','cResponsable\ResponsableController@updatePasswordDoc')->name('readyToUpdatePassResp');

    //update and change the role 
    Route::get('vResponsable/lecturas/listConfigEmployee','cResponsable\configRole\ConfigEmployeeController@index')->name('viewConfigEmployee');
    Route::put('vResponsable/listConfigEmployee','cResponsable\configRole\ConfigEmployeeController@updateEployeeToResponsable')->name('updateRol');
    Route::put('vResponsable','cResponsable\configRole\ConfigEmployeeController@changeRolOfResponsable')->name('changeRolOfResp');
    Route::delete('vResponsable','cResponsable\configRole\ConfigEmployeeController@deleteTheRolOfResp')->name('deleteRolOfResp');

    //routes for the acces to all info to the carrer OPERACIONES
    Route::get('vResponsable/instituto/opCarrerasResp','cResponsable\operaciones\CarrerasResController@index')->name('OpWithCarrers');
    Route::post('vResponsable','cResponsable\operaciones\CarrerasResController@setMyCarrers')->name('chooseMyCarrers');
    Route::delete('vResponsable/opCarrerasResp','cResponsable\operaciones\CarrerasResController@deleteMyCarrer')->name('deleteCarreOfResp');
    //Route::post('vResponsable/opCarrerasResp','operaciones\CarrerasResController@addCampus')->name('addCampus');
    //Route::post('vResponsable/welcome','operaciones\CarrerasResController@addCarrer')->name('addCarrera');
    //routes for the edit campus OPERACIONES
    Route::get('vResponsable/instituto/opToaddCampus','cResponsable\operaciones\opCampusController@index')->name('ViewAddCampus');
    Route::post('vResponsable/opCarrerasResp','cResponsable\operaciones\opCampusController@addCampusRespCon')->name('addCampus');

    Route::delete('vResponsable/opToaddCampus/{id}','cResponsable\operaciones\opCampusController@deleteCampusRespCon')->name('deleteCampus');
    Route::get('vResponsable/opToaddCampus/{id}','cResponsable\operaciones\opCampusController@editCampusRespcon')->name('editCampus');
    Route::put('vResponsable/opToaddCampus/{id}','cResponsable\operaciones\opCampusController@updateCampus')->name('updateCampus');

    //routes for operation with carrera OPERACIONES
    Route::get('vResponsable/instituto/opWithCarrera/opToaddCarrera','cResponsable\operaciones\opCarrerasController@index')->name('viewPropertyCarrera');
    Route::post('vResponsable/opWithCarrera/opToaddCarrera/{id}','cResponsable\operaciones\opCarrerasController@addNewCarrera')->name('addCarrera');
    Route::delete('vResponsable/opWithCarrera/opToaddCarrera/{id}','cResponsable\operaciones\opCarrerasController@deleteCarrera')->name('deleteCarrera');
    Route::get('vResponsable/instituto/opwithCarrera/viewCarreraEdit/{id}','cResponsable\operaciones\opCarrerasController@showEditCarrera')->name('viewToEditCarrera');
    Route::put('vResponsable/opwithCarrera/viewCarreraEdit/{id}','cResponsable\operaciones\opCarrerasController@updateCarrera')->name('readyToUpdateCarrera');

    //routes for add carrera from another campus OPERACIONES
    Route::get('vResponsable/instituto/opWithCarrera/addCarreraToAnotherCampus','cResponsable\operaciones\opCarrerasController@addCarreraAnotherCampus')->name('addCarreraAnothCampus');
    Route::post('vResponsable/opWithCarrera/addCarreraToAnotherCampus','cResponsable\operaciones\opCarrerasController@showcarrerasC')->name('showCarrerasAnotherC');
    Route::post('vResponsable/opWithCarrera/addCarreraToAnotherCampus/{id}','cResponsable\operaciones\opCarrerasController@addCarreraOfAnotherCampus')->name('readyToaddNewCarreraOfAC');

    //routes for date set to reports and choose titled
    Route::resource('dates','cResponsable\dates\dateSetTitlesController');
    Route::resource('datesReport','cResponsable\dates\dateSetToSendReportController');
    //routes for accept titles
    Route::resource('vResponsable/lecturas/accepted-titles','cResponsable\titulos\acceptedTitleController');
    //routes for tittles temporals
    Route::resource('vResponsable/lecturas/check-titles','cResponsable\titulos\temporalTitleRespController');

    //routes for config status of student and employee
    Route::get('vResponsable/instituto/opWithUsers/opWithStudent','cResponsable\configStatusUsers\statusStudentController@index')->name('statuStudent');
    Route::get('vResponsable/instituto/opWithUsers/opWithEmployee','cResponsable\configStatusUsers\statusEmployeeController@index')->name('statusDocente');
    
});





//****** RUTAS PARA LAS VISTAS DE PRINCIPAL ******/
Route::view('vPrincipal/plantillas/acercade','vPrincipal.plantillas.acercade')->name('vAcercaDe');
Route::view('vPrincipal/plantillas/frases','vPrincipal.plantillas.frases')->name('vFrases');
Route::view('vPrincipal/plantillas/noticias','vPrincipal.plantillas.noticias')->name('vNoticias');

//message view for the status, when the user is not active, then appear the view.
Route::view('vStatus/welcome','vStatus.welcome')->middleware('auth','notstatus')->name('statusMsg');