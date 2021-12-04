<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

     /**
     * The story that belong to the category.
     */
    public function stories()
    {
        return $this->belongsToMany('App\Models\Story');
        // ->using('App\RoleUser');;
    }
}
