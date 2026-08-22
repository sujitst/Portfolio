<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class SiteSetting extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'copyright_name',
        'link',
        'year',
        'fave_icon',
        'logo'
    ];
}
