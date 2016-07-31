<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingNotification extends Model
{
    protected $table = 'booking_notifications'; //table name connection

    protected $fillable = array('Code');

    public $timestamps = false;
}
