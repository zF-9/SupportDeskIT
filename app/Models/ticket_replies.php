<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ticket_replies extends Model
{
    //
    public function ticket_replies() {
    	return $this->belongsTo(ticket::class);
    }   
}
