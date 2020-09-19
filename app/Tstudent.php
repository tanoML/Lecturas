<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tstudent extends Model
{
    //
    protected $primaryKey = 'id_student';

    protected $fillable = [
        'id_student', 'matricula', 'id_responsable', 'id_semestre', 'sexo', 'id_periodo',
    ];

    protected $guarded = [
        'id_student'
    ];

    //this relations is for the user model
    public function user(){
        return $this->belongsTo('App\User');
    }

}
