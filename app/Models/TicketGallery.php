<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketGallery extends Model
{
    protected $table = 'ticket_gallery';
    protected $fillable = ['title','image', 'ticket_uid'];
}
