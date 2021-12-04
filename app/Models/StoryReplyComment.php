<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryReplyComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'story_comment_id', 'content'];


    /**
     * Get the user that owns the reply.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the comment that owns the reply.
     */
    public function comment()
    {
        return $this->belongsTo(StoryComment::class, 'story_comment_id', 'id');
    }
}
