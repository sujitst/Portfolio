<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class About extends Model
{

    //=====|| MASS ASSIGNABLE ATTRIBUTES
    protected $fillable = [
        'info_id',
        'description',
        'number',
        'age',
        'nationality',
        'gender',
        'marital_status',
        'dob',
    ];


    
    //=====|| RELATIONSHIP WITH MY INFORMATION
    public function information() {
        return $this->belongsTo(MyInformation::class, 'info_id');
    }
}