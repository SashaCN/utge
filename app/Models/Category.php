<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['sub_categories'];
    protected $dates = ['deleted_at'];
    protected $fillable = ['product_type_id'];

    public function product_types()
    {
        return $this->belongsTo(ProductType::class);
    }
    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function localization()
    {
        return $this->morphMany(Localization::class, 'localizationable');
    }
}
