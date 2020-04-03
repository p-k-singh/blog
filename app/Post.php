<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    public $directory="/images/";
//    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=[
        'title',
        'body',
        'cover_images',
    ];
    protected $hidden=['password','remember_token'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getPatheAttribute($value)
    {
        return $this->directory.$value;
    }
}
