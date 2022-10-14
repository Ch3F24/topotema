<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;


class Event extends Eloquent
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $connection = 'oracle';
}
