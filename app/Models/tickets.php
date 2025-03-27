<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    //
    public function tickets() {
    	return $this->belongsTo(user::class);
        return $this->belongsTo(department::class);
    }   
}
