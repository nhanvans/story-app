<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['story_id', 'name', 'content'];

    /**
     * Get the story that owns the chapter.
     */
    public function story()
    {
        return $this->belongsTo(Story::class, 'story_id', 'id');
    }

    public function scopeNext($query){
        return $query->where('id', '>', $this->id)->where('story_id', $this->story_id)->orderBy('id','asc');

    }
    public function scopePrevious($query){
        return $query->where('id', '<', $this->id)->where('story_id', $this->story_id)->orderBy('id','desc');

    }
}
