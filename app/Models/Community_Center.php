<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\SoftDeletes;
class Community_Center extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];


        function Community_Center_relationBetweenUser()
              {
              return $this->hasOne('App\Models\User','id','user_id');
              }
}
