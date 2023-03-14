<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramBugReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'severity',
        'status',
    ];
}
