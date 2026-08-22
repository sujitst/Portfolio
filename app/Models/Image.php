<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
    //=====|| MASS ASSIGNABLE ATTRIBUTES
    protected $fillable = [
        'category_id',
        'image',
        'video',
    ];



    //=====|| RELATIONSHIP WITH CATEGORY
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
