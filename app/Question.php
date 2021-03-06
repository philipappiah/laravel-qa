<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body'];
    public function User (){
        return $this->belongsTo(User::class);
    }

     //setting a mutator
     public function setTitleAttribute($value)
     {
         $this->attributes['title'] = $value;
         $this->attributes['slug'] = str_slug($value);


     }

     public function getAUrlAttribute()
     {
         return route("questions.show", $this->id);

     }

     public function getCreatedDateAttribute()
     {
         return $this->created_at->diffForhumans();
     }

}
