<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    //=====|| MASS ASSIGNABLE ATTRIBUTES
    protected $fillable = [
        'name'
    ];

    

    //=====|| RELATIONSHIP WITH IMAGES
    public function images() {
        return $this->hasMany(Image::class);
    }
}
