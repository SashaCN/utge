<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class ServicesType extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes, CascadeSoftDeletes;
    use InteractsWithMedia;

    protected $cascadeDeletes = ['categories'];
    protected $dates = ['deleted_at'];

    public function localization()
    {
        return $this->morphMany(Localization::class, 'localizationable');
    }

    public function categories()
    {

        return $this->hasMany(ServicesCategory::class);
    }
}
