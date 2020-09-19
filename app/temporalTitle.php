<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temporalTitle extends Model
{
    //


    public function scopeSizeOfTemporalTitles($query)
    {
        return $query->count();
    }

    //function to get size of for the temporals_titles in the DB
    //temporalTitle::SizeOfTemp()->total_temp_titles
    public function scopeSizeOfTemp($query)
    {
        return $query->selectRaw('count(*) as total_temp_titles')->first();
    }

}
