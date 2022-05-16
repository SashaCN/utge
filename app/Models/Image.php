<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $filable = ['url'];
    public $timestamp = false;

    public function imageable()
    {
        return $this->morphTo();
    }
}
