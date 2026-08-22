<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Experienc extends Model
{
    //=====|| MASS ASSIGNABLE ATTRIBUTES
    protected $fillable = [
        'exp_name', 
        'exp_date_time'
    ];
}
