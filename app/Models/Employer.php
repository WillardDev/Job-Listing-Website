<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
