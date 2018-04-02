<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // Mutators

    public function setTitleAttribute($value){

        $this->attributes['title'] = $value;

        $this->attributes['slug']  = Str::slug($value);
    }
}
