<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'project_url',
        'github_url',
        'start_date',
        'end_date',
        'featured',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
