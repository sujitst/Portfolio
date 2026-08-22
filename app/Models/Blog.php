<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{

    //=====|| MASS ASSIGNABLE ATTRIBUTES
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image',
        'status',
    ];



    //=====|| RELATIONSHIP WITH USER
    public function user() {
        return $this->belongsTo(User::class);       
    }
}
