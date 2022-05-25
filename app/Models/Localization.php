<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    use HasFactory;

    protected $fillable = ['title_uk', 'description_uk', 'title_ru', 'description_uk'];
    public $timestamps = true;

    public function localizationable()
    {
        return $this->MorphTo();
    }
}
