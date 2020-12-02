<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'project_id',
        'creator_id',
        'user_id',
        'status',
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'task_id');
    }
}
