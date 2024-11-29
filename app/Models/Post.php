<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "description",
        "images"
    ];
    public function getImagesAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }


    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }
}
