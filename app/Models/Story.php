<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'avatar', 'author', 'source', 'status', 'total_chapter','description', 'total_rating', 'average_rating'];

      /**
     * The categories that belong to the story.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_story', 'story_id', 'category_id');
    }

    /**
     * Get the chapters for the story.
     */
    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'story_id', 'id');
    }

    /**
     * Get the comments for the story.
     */
    public function comments()
    {
        return $this->hasMany(StoryComment::class, 'story_id', 'id');
    }
}
