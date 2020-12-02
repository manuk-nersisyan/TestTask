<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function members()
    {
        return $this->hasMany('App\Models\Member', 'project_id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'project_id');
    }
}
