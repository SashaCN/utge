<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Support\Facades\DB;

class ServicesType extends Model
{
    use HasFactory;
    use SoftDeletes, CascadeSoftDeletes;

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
