<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = ['expected_salary', 'user_id', 'job_id', 'cv_path'];
    // app/Models/JobApplication.php
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function job()
    {
        return $this->belongsTo(\App\Models\Job::class);
    }
}
