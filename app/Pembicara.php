<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembicara extends Model
{
    public function webinar(){
        return $this->belongsTo(WebinarJadwal::class, 'webinar_id', 'id');
    }   
}
