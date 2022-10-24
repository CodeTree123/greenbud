<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filter_process extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(catagory_info::class, 'cat_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
