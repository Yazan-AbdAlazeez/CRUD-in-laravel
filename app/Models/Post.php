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
        return json_decode($value, true) ?? []; // Decode JSON to array or return empty array
    }

    // Mutator to convert array to JSON string when setting the images attribute
    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value); // Encode array to JSON
    }
}
