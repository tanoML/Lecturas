<?php

namespace App\Http\Controllers\cResponsable\configStatusUsers;

use App\Http\Controllers\Controller;
use App\temporalTitle;
use Illuminate\Http\Request;

class statusStudentController extends Controller
{
    //

    public function index()
    {

        return view('vResponsable.opWithUsers.opWithStudent',[
            'sizeTempTitles' => temporalTitle::SizeOfTemp()->total_temp_titles,
        ]);
    }

}
