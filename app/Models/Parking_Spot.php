<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Parking_Spot extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    // public function getSearchResult(): SearchResult
    //     {
    //         $url = route('parking.show', $this->id);

    //         return new SearchResult(
    //             $this,
    //             $this->address,
    //             $url
    //         );
    //     }

        function Parking_Spot_relationBetweenUser()
              {
              return $this->hasOne('App\Models\User','id','user_id');
              }
}
