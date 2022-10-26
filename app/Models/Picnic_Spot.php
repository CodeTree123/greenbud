<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Searchable\Searchable;
// use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\SoftDeletes;
class Picnic_Spot extends Model
{
  use HasFactory;
  use SoftDeletes;
  protected $guarded = [];

//   public function getSearchResult(): SearchResult
//       {
//           $url = route('picnic_spot.show', $this->id);

//           return new SearchResult(
//               $this,
//               $this->address,
//               $url
//           );
//       }

      function Picnic_spot_relationBetweenUser()
            {
            return $this->hasOne('App\Models\User','id','user_id');
            }
}
