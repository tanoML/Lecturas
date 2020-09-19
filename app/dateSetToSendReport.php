<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dateSetToSendReport extends Model
{
    //this model is for set the date to send report
    protected $table = 'date_set_to_send_reports';

    protected $fillable = [
        'dateStartR','dateEndR','fullDate','parcial'
    ];


    
    //get the size of the table dates
    public function scopeSizeOfDatesToSendReport($query)
    {
        return $query->count();
    }


}
