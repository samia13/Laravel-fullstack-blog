<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title', 
        'slug', 
        'excerpt', 
        'body',  
        'featured', 
        'image', 
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeFeatured($query){
        return $query->where('featured', true);
    }

    public function previousPost(){
        return  Post::where('id', '<', $this->id)->orderBy('id','desc')->first();
    }

    public function nextPost(){
        return Post::where('id', '>', $this->id)->orderBy('id')->first();
    }
}
