<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class MyInformation extends Model
{
    //=====|| MASS ASSIGNABLE ATTRIBUTES
    protected $fillable = [
        'name',
        'title',
        'description',
        'skills',
        'cv',
        'picture'
    ];


    //=====|| CASTING SKILLS AS ARRAY
    protected $casts = [
        'skills' => 'array'
    ];
}
