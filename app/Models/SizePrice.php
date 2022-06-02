<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SizePrice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['size', 'price', 'deleted_at'];
    protected $fillable = ['route'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
