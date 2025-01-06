<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $casts = [
        'created_at' => 'datetime',
    ];
    protected $append =['post_time'];
    protected $fillable = ['title', 'content', 'id', 'category', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function getImageAttribute()
    {
        return asset('storage/posts/' . $this->attributes['image']);
    }

    public function getPostTimeAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getDateAttribute(){
        return $this->created_at->format('d-m-Y');
    }
}
