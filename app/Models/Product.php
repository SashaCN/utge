<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;


    protected $dates = ['deleted_at'];
    protected $fillable = ['available', 'list_position', 'home_view'];

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class, 'category_products');
    // }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function localization()
    {
        return $this->morphMany(Localization::class, 'localizationable');
    }
    public function sizePrices()
    {
        return $this->hasMany(SizePrice::class);
    }
}
