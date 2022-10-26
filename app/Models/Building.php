<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    protected $guarded = [];



        function Building_relationBetweenUser()
              {
              return $this->hasOne('App\Models\User','id','user_id');
              }
}
