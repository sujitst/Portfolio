<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    //=====|| MASS ASSIGNABLE ATTRIBUTES
    protected $fillable = [
        'name',
        'image',
        'description',
    ];
}
