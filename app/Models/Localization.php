<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    use HasFactory;

    protected $fillable = ['var', 'uk', 'ru'];
    public $timestamps = true;

    public function localizationable()
    {
        return $this->MorphTo();
    }

    // public function product()
    // {
    //     return $this->morphedByMany(Product::class, 'localizationable');
    // }

    // public function productType()
    // {
    //     return $this->morphedByMany(ProductType::class, 'localizationable');
    // }
}
