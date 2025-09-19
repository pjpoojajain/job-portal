<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class All_job extends Model
{
    protected $fillable = [
        'employer_id', 'title', 'company', 'skill_set', 'description', 'location', 'salary', 'experience', 'job_type', 'total_openings'
    ];
}
