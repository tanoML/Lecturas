<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{

    protected $table = 'institutes';

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_campus','carrera',
    ];

    //relations for the user
    public function user(){
        return $this->belongsTo('App\User','id_insitute');
    }

    public function campus()
    {
        return $this->belongsTo('App\Campus','id')->select('id','name');
    }


    //get the size of the carrers by id
    public function scopeSizeOfCarrers($query,$id)
    {
        return $query->where('id_campus',$id)->count();
    }

    //get the id of campus of the current user
    public function scopeGetIdOfCampus($query,$id)
    {
        return $query->select('id_campus')->where('id',$id)->first();
    }

    //get all the name of the carrerr by id
    public function scopeGetAllCarrersById($query,$id)
    {
        return $query->select('id','carrera')->where('id_campus',$id)->paginate(3);
    }




}
