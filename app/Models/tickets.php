<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    //
    protected $table = 'tickets';
    protected $fillable = ['resolved', 'admin_read', 'user_read', 'last_reply']; 
    
    public function tickets() { 

        return $this->hasMany(ticket_replies::class);
    	return $this->belongsTo(user::class);
        return $this->belongsTo(department::class);  

    }  

}
