<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Exibution_Center extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];



        function Exibution_Center_relationBetweenUser()
              {
              return $this->hasOne('App\Models\User','id','user_id');
              }
}
