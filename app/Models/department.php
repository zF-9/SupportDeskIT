<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    //
    public function department() {
    	return $this->hasMany(user::class);
    }   
}
