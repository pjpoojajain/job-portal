<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = ['job_id', 'user_id', 'cover_letter'];

    public function job()
    {
        return $this->belongsTo(All_job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
