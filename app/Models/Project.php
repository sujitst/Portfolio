<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    //=====|| MASS ASSIGNABLE ATTRIBUTES
    protected $fillable = [
        'name',
        'rating',
        'price',
        'image',
        'link',
        'status',
    ];
}
