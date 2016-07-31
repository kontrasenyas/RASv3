<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{    
    protected $table = 'products'; //table name connection

    // protected $fillable = [
    // 'ProductName', 
    // 'Capacity'
    // ];
    protected $fillable = array('Title', 'Capacity', 'EmailAddress', 'Photo1', 'Details', 'DateCreated');

    public $timestamps = false;
}