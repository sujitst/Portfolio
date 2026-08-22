<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Faq extends Model
{
    //=====|| THE ATTRIBUTES THAT ARE MASS ASSIGNABLE.
    protected $fillable = [
        'question',
        'answer',
    ];
}
