<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dateSetTitles extends Model
{
    //this model is for set the date to choose and register the titles
    protected $table = 'date_set_titles';

    

    protected $fillable = [
        'dateStart','dateEnd','fullDate','parcial'
    ];

    //get the size of the table dates
    public function scopeSizeOfDates($query)
    {
        return $query->count();
    }
    

}
