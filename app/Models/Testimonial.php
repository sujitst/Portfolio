<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Testimonial extends Model
{
    //=====|| MASS ASSIGNABLE ATTRIBUTES
    protected $fillable = [
        'name',
        'position',
        'rating',
        'comment',
        'image',
        'status',
    ];
}
