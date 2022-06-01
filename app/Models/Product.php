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
    protected $fillable = ['article', 'shipable', 'price', 'available', 'max_order', 'list_position'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }
    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class, 'product_sub_categories', 'product_id', 'sub_category_id');
    }
    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function localization()
    {
        return $this->morphMany(Localization::class, 'localizationable');
    }


}
