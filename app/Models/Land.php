<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Land extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    // public function getSearchResult(): SearchResult
    //     {
    //         $url = route('land.show', $this->id);

    //         return new SearchResult(
    //             $this,
    //             $this->address,
    //             $url
    //         );
    //     }

        function Land_relationBetweenUser()
              {
              return $this->hasOne('App\Models\User','id','user_id');
              }
}
