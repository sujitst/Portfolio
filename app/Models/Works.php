<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Works extends Model
{
    //=====|| MASS ASSIGNABLE ATTRIBUTES
    protected $fillable = [
        'name',
        'number',
        'picture'
    ];
}
