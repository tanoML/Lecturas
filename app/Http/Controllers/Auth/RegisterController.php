<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Tstudent;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo(){
        //if all it's ok, then verify the saved user into the tables, if doesn't in t_worker then search to t_student
        //where to found redirect to the view
        if(Auth::user()->role === 'E')
            return 'vDocente/welcome';
        elseif(Auth::user()->role === 'S')
            return 'vAlumno/welcome';
 }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastName' => ['required','string','max:255'],
            'carrer' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

          //here we first check the array, if we found data for student then create a new student
        //but if there is not fields, then create the worker user.
        if(Arr::exists($data,'matricula') && Arr::exists($data,'responsable') 
            && Arr::exists($data,'periodo') && Arr::exists($data,'semestre') && Arr::exists($data,'sexo')  ){

                //first save the data for student then save in tstudent
                $usr_student = User::create([
                    'name' => $data['name'],
                    'lastName' => $data['lastName'],
                    'id_institute' => $data['carrer'],
                    'role' => 'S',
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);
                 //get the last id for the new user 
                $student_id = User::latest()->first()->id;
                 //then save into t_student
                 Tstudent::create([
                    'id_student' => $student_id,
                    'matricula' => $data['matricula'],
                    'id_responsable' => $data['responsable'],
                    'id_semestre' => $data['semestre'],
                    'sexo' => $data['sexo'],
                    'id_periodo' => $data['periodo'],
                ]);
                //finally return the user
                return $usr_student;


            }else{

                 //save the worker user and add the data after save in tworker
                $usr_worker = User::create([
                    'name' => $data['name'],
                    'lastName' => $data['lastName'],
                    'id_institute' => $data['carrer'],
                    'role' => 'E',
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);

                return $usr_worker;
            }
        

        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
    }
}
