<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Skills extends Model
{
    //=====|| MASS ASSIGNABLE ATTRIBUTES
    protected $fillable = [
        'name', 
        'percent'
    ];
}
